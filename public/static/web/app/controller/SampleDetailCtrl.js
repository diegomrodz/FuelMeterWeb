FuelMeterWeb.controller('SampleDetailCtrl', ['$scope', '$routeParams', 'SampleRepository',
    function ($scope, $routeParams, SampleRepository) {
        $scope.sensor = {};

        SampleRepository.find($routeParams.sampleId).then(function (res) {
            $scope.sensor = res.data;
        });
    }
]);