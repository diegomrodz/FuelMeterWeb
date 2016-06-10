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
            var geoCodeUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=Brasil," + $scope.sample.stationCep;

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