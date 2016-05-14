FuelMeterWeb.controller('NewSampleCtrl', ['$scope', '$http', '$location', 'AEACService', 'SampleRepository',
    function ($scope, $http, $location, AEACService, SampleRepository) {

        $scope.postSample = function () {
            var sample = {};

            sample.name = $scope.name;
            sample.email = $scope.email;
            sample.institution = $scope.institution;
            sample.attendant_name = $scope.attendantName;
            sample.station_name = $scope.stationName;
            sample.station_flag = $scope.stationFlag;
            sample.station_cep = $scope.stationCep;
            sample.station_district = $scope.stationDistrict;
            sample.station_state = $scope.stationState;
            sample.station_city = $scope.stationCity;
            sample.station_lat = $scope.stationLat;
            sample.station_lng = $scope.stationLng;
            sample.sample_volume = $scope.sampleVolume;
            sample.sample_result = $scope.sampleResult;
            sample.proceedings = $scope.proceedings;
            sample.observation = $scope.observation;

            SampleRepository.store(sample).then(function (res) {

                $location.path("/sample/" + res.data.id);

            }, function () {

                alert("Houve um erro no envio desta amostra, por favor tentar novamente mais tarde.");

            });

        };

        $scope.calcAEAC = function () {
            if (! $scope.sampleVolume || $scope.sampleVolume == "") return "";

            return AEACService.calc($scope.sampleVolume);
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