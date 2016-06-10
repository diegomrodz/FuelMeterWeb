FuelMeterWeb.controller('IndexCtrl', ['$scope', 'SampleRepository', 'AEACService',
    function ($scope, SampleRepository, AEACService) {
        $scope.markers = [];

        $scope.getLast = function (arr) {
            return arr[arr.length - 1];
        };
        
        $scope.getRangeClass = function (res) {
            if (res > AEACService.CURRENT_LIMIT) {
                return "custom-marker-danger";
            }
            
            if (res > AEACService.CURRENT_LIMIT - 2) {
                return "custom-marker-alert";
            }
            
            return "";
        };

        SampleRepository.groupBy("station_cep").then(function (res) {
           $scope.markers = res.data; 
        });
    }
]);