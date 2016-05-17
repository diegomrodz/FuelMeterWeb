FuelMeterWeb.controller('IndexCtrl', ['$scope', 'SampleRepository',
    function ($scope, SampleRepository) {
        $scope.markers = [];

        SampleRepository.all().then(function (res) {
            $scope.markers = res.data;
        });
    }
]);