var FuelMeterWeb = angular.module('FuelMeterWeb', ['ngRoute']);

var APP_URL = $("#APP_URL").val();

function app_url(path) {
    return APP_URL + "/" + path;
}

function web_url(path) {
    return app_url("web/" + path);
}

FuelMeterWeb.run([
   function () {

   }
]);