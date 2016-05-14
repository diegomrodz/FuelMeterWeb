FuelMeterWeb.config(['$routeProvider',
    function ($routeProvider) {

        $routeProvider
            .when("/", {
                templateUrl: web_url("index"),
                controller: "IndexCtrl"
            })
            .when("/new", {
                templateUrl: web_url("sample/new"),
                controller: "NewSampleCtrl"
            });

    }
]);