FuelMeterWeb.service('SampleRepository', ['$http',
    function ($http) {
        var me = this;

        me.find = function (id) {
            return $http({
                url: api_v1_url("sample/" + id),
                method: "get",
                dataType: "json"
            });
        };

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

        me.all = function () {
            return $http({
                url: api_v1_url("sample"),
                method: "get",
                dataType: "json"
            });
        };
        
        me.groupBy = function (field) {
            return $http({
               url: api_v1_url("sample?groupBy=" + field),
               method: "get",
               dataType: "json" 
            });
        };
    }
])