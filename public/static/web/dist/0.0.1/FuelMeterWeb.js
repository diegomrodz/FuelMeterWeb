var FuelMeterWeb = angular.module('FuelMeterWeb', ['ngRoute']);

var APP_URL = $("#APP_URL").val();
var CSRF_TOKEN = $("#CSRF_TOKEN").val();

function app_url(path) {
    return APP_URL + "/" + path;
}

function web_url(path) {
    return app_url("web/" + path);
}

function api_url(path) {
    return app_url("api/" + path);
}

function api_v1_url(path) {
    return api_url("v1/" + path);
}

FuelMeterWeb.run([
   function () {

   }
]);

FuelMeterWeb.config(['$routeProvider',
    function ($routeProvider) {

        $routeProvider
            .when("/", {
                templateUrl: web_url("index"),
                controller: "IndexCtrl"
            })
            .when("/new", {
                templateUrl: web_url("sample/new"),
                controller: "NewSampleCtrl"
            });

    }
]);

FuelMeterWeb.controller('IndexCtrl', ['$scope',
    function ($scope) {
    }
]);

FuelMeterWeb.controller('NewSampleCtrl', ['$scope', '$http', 'AEACService',
    function ($scope, $http, AEACService) {

        $scope.calcAEAC = function () {
            if (! $scope.sampleVolume || $scope.sampleVolume == "") return "";

            return AEACService.calc($scope.sampleVolume) * 100;
        };

        $scope.searchCep = function () {
            if (!$scope.stationCep || $scope.stationCep == "") {
                return alert("Por favor, informe o cep para pesquisar o endereço.");
            }

            var viaCepUrl = "https://viacep.com.br/ws/" + $scope.stationCep + "/json/";
            var geoCodeUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=" + $scope.stationCep;

            $http({
                url: viaCepUrl,
                method: "get",
                dataType: "json"
            }).then(function (res) {

                $scope.stationState = res.data.uf;
                $scope.stationCity = res.data.localidade;
                $scope.stationDistrict = res.data.bairro;
                $scope.stationAddress = res.data.logradouro;

            }, function () {
                alert("Houve um erro na busca do endereço, por favor verifique se o CEP foi informado corretamente");
            });

            $http({
                url: geoCodeUrl,
                method: "get",
                dataType: "json"
            }).then(function (res) {
                var data = res.data.results[0];

                $scope.stationLat = data.geometry.location.lat;
                $scope.stationLng = data.geometry.location.lng;

            }, function () {
                alert("Houve um erro na obtenção das coordenadas geográficas do cep informado.");
            });
        };
    }
]);

FuelMeterWeb.service('SampleRepository', ['$http',
    function () {
        var me = this;
        
        me.store = function (sample) {
            return $http({
                url: api_v1_url("sample"),
                method: "post",
                data: {
                    sample: sample,
                    _token: CSRF_TOKEN
                },
                dataType: "json"
            });
        };
        
    }
])

FuelMeterWeb.service('AEACService' ,[
    function () {
        var me = this;

        me.calc = function (vol) {
            var dif = (vol - 50);
            if (dif < 0.5) return 0.01;
            var res = (dif * 2) + 1;

            return (res > 0 ? res : -res) / 100;
        }
    }
]);