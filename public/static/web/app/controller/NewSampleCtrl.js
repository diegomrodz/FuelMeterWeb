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