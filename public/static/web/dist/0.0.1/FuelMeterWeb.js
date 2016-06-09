var FuelMeterWeb = angular.module('FuelMeterWeb', ['ngRoute', 'ngMap', 'ngDialog', 'datatables', 'file-model', 'ui.bootstrap']);

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

FuelMeterWeb.service('AEACService' ,[
    function () {
        var me = this;

        me.calc = function (vol) {
            var dif = (vol - 50);
            if (dif < 0.5) return 0.01;
            var res = (dif * 2) + 1;

            return (res > 0 ? res : -res);
        }
    }
]);

FuelMeterWeb.service("CurrentSampleService", [
    function () {
        var me = this;
        
        me.clear = function () {
        };
    }
]);

FuelMeterWeb.service('SampleRepository', ['$http',
    function ($http) {
        var me = this;

        me.find = function (id) {
            return $http({
                url: api_v1_url("sample/" + id),
                method: "get",
                dataType: "json"
            });
        };

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

        me.all = function () {
            return $http({
                url: api_v1_url("sample"),
                method: "get",
                dataType: "json"
            });
        };
        
        me.groupBy = function (field) {
            return $http({
               url: api_v1_url("sample?groupBy=" + field),
               method: "get",
               dataType: "json" 
            });
        };
    }
])

FuelMeterWeb.controller('FloatingButtonCtrl', ['$scope', '$rootScope', '$location',
   function ($scope, $rootScope, $location) {
       $scope.isVisible = false;

       $rootScope.$on('$locationChangeSuccess', function(event){
           if ($location.path() == "/") {
               $scope.isVisible = true;
           } else {
               $scope.isVisible = false;
           }
       });
   }
]);

FuelMeterWeb.controller('HowToCtrl', ['$scope',
    function ($scope) {
        
    }
]);

FuelMeterWeb.controller('IndexCtrl', ['$scope', 'SampleRepository',
    function ($scope, SampleRepository) {
        $scope.markers = [];

        SampleRepository.groupBy("station_cep").then(function (res) {
           $scope.markers = res.data; 
        });
    }
]);

FuelMeterWeb.controller('NavBarCtrl', ['$scope',
    function ($scope) {
        $scope.isCollapsed = true;
    }
]);

FuelMeterWeb.controller('NewSampleCtrl', ['$scope', '$http', '$location', 'ngDialog', 'AEACService', 'SampleRepository', 'CurrentSampleService',
    function ($scope, $http, $location, ngDialog,  AEACService, SampleRepository, CurrentSampleService) {

        $scope.sample = CurrentSampleService;
        
        $scope.whyUndergroundTanks = function () {
            ngDialog.open({
                template: 'whyUndergroundTanks.html',
                className: 'ngdialog-theme-default'
            });
        };
        
        $scope.howToKnowTheVolume = function () {
            ngDialog.open({
                template: 'howToKnowTheVolume.html',
                className: 'ngdialog-theme-default'
            });
        };
        
        $scope.correctProceedings = function () {
            ngDialog.open({
               template: 'correctProceedings.html',
               className: 'ngdialog-theme-default' 
            });
        };
        
        $scope.postSample = function () {
            var sample = {};

            sample.name = $scope.sample.name;
            sample.email = $scope.sample.email;
            sample.institution = $scope.sample.institution;
            sample.attendant_name = $scope.sample.attendantName;
            sample.station_name = $scope.sample.stationName;
            sample.station_flag = $scope.sample.stationFlag;
            sample.station_cep = $scope.sample.stationCep;
            sample.underground_tanks_number = $scope.sample.undergroundTanksNumber;
            sample.station_address = $scope.sample.stationAddress;
            sample.station_district = $scope.sample.stationDistrict;
            sample.station_state = $scope.sample.stationState;
            sample.station_city = $scope.sample.stationCity;
            sample.station_lat = $scope.sample.stationLat;
            sample.station_lng = $scope.sample.stationLng;
            sample.sample_volume = $scope.sample.sampleVolume;
            sample.sample_result = $scope.calcAEAC($scope.sample.sampleVolume);
            sample.proceedings = $scope.sample.proceedings;
            sample.observation = $scope.sample.observation;

            SampleRepository.store(sample).then(function (res) {

                CurrentSampleService.clear();
                
                $location.path("/sample/" + res.data.id);

            }, function () {

                alert("Houve um erro no envio desta amostra, por favor tentar novamente mais tarde.");

            });

        };

        $scope.calcAEAC = function () {
            if (! $scope.sample.sampleVolume || $scope.sample.sampleVolume == "") return "";

            return AEACService.calc($scope.sample.sampleVolume);
        };

        $scope.searchCep = function () {
            if (!$scope.sample.stationCep || $scope.sample.stationCep == "") {
                return alert("Por favor, informe o cep para pesquisar o endereço.");
            }

            var viaCepUrl = "https://viacep.com.br/ws/" + $scope.sample.stationCep + "/json/";
            var geoCodeUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=" + $scope.sample.stationCep;

            $http({
                url: viaCepUrl,
                method: "get",
                dataType: "json"
            }).then(function (res) {

                $scope.sample.stationState = res.data.uf;
                $scope.sample.stationCity = res.data.localidade;
                $scope.sample.stationDistrict = res.data.bairro;
                $scope.sample.stationAddress = res.data.logradouro;

            }, function () {
                alert("Houve um erro na busca do endereço, por favor verifique se o CEP foi informado corretamente");
            });

            $http({
                url: geoCodeUrl,
                method: "get",
                dataType: "json"
            }).then(function (res) {
                var data = res.data.results[0];

                $scope.sample.stationLat = data.geometry.location.lat;
                $scope.sample.stationLng = data.geometry.location.lng;

            }, function () {
                alert("Houve um erro na obtenção das coordenadas geográficas do cep informado.");
            });
        };
    }
]);

FuelMeterWeb.controller('SampleDataCtrl', ['$scope', 'SampleRepository',
    function ($scope, SampleRepository) {
        $scope.samples = [];

        SampleRepository.all().then(function (res) {
            $scope.samples = res.data;
        });
    }
]);

FuelMeterWeb.controller('SampleDetailCtrl', ['$scope', '$routeParams', 'SampleRepository',
    function ($scope, $routeParams, SampleRepository) {
        $scope.sensor = {};

        SampleRepository.find($routeParams.sampleId).then(function (res) {
            $scope.sensor = res.data;
        });
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
            })
            .when("/data", {
                templateUrl: web_url("sample/data"),
                controller: "SampleDataCtrl"
            })
            .when('/how-to', {
                templateUrl: web_url("how-to"),
                controller: "HowToCtrl",
            })
            .when("/sample/:sampleId", {
                templateUrl: web_url("sample/detail"),
                controller: "SampleDetailCtrl"
            })
            .when("/about", {
                templateUrl: web_url("about")
            });

    }
]);