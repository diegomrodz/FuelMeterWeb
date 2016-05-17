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