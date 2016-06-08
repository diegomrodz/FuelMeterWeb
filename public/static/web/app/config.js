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
            })
            .when("/data", {
                templateUrl: web_url("sample/data"),
                controller: "SampleDataCtrl"
            })
            .when('/how-to', {
                templateUrl: web_url("how-to"),
                controller: "HowToCtrl",
            })
            .when("/sample/:sampleId", {
                templateUrl: web_url("sample/detail"),
                controller: "SampleDetailCtrl"
            })
            .when("/about", {
                templateUrl: web_url("about")
            });

    }
]);