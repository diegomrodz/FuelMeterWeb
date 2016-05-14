FuelMeterWeb.service('AEACService' ,[
    function () {
        var me = this;

        me.calc = function (vol) {
            var dif = (vol - 50);
            if (dif < 0.5) return 0.01;
            var res = (dif * 2) + 1;

            return (res > 0 ? res : -res);
        }
    }
]);