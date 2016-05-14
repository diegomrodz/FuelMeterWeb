FuelMeterWeb.service('SampleRepository', ['$http',
    function ($http) {
        var me = this;
        
        me.store = function (sample) {
            return $http({
                url: api_v1_url("sample"),
                method: "post",
                data: {
                    sample: sample,
                    _token: CSRF_TOKEN
                },
                dataType: "json"
            });
        };
        
    }
])