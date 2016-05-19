FuelMeterWeb.controller('SampleDataCtrl', ['$scope', 'SampleRepository',
    function ($scope, SampleRepository) {
        $scope.samples = [];

        SampleRepository.all().then(function (res) {
            $scope.samples = res.data;
        });
    }
]);