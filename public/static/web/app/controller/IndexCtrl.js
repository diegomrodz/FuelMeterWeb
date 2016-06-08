FuelMeterWeb.controller('IndexCtrl', ['$scope', 'SampleRepository',
    function ($scope, SampleRepository) {
        $scope.markers = [];

        SampleRepository.groupBy("station_cep").then(function (res) {
           $scope.markers = res.data; 
        });
    }
]);