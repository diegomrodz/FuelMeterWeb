FuelMeterWeb.controller("StationDetailCtrl", ["$scope", '$routeParams', "SampleRepository",
    function ($scope, $routeParams, SampleRepository) {
        $scope.station = {};
        $scope.samples = [];
        
        SampleRepository.byCep($routeParams.cep).then(function (res) {
            $scope.station = res.data[0];
            $scope.samples = res.data;
        });
    }
]);