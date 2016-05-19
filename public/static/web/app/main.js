var FuelMeterWeb = angular.module('FuelMeterWeb', ['ngRoute', 'ngMap', 'datatables']);

var APP_URL = $("#APP_URL").val();
var CSRF_TOKEN = $("#CSRF_TOKEN").val();

function app_url(path) {
    return APP_URL + "/" + path;
}

function web_url(path) {
    return app_url("web/" + path);
}

function api_url(path) {
    return app_url("api/" + path);
}

function api_v1_url(path) {
    return api_url("v1/" + path);
}

FuelMeterWeb.run([
   function () {

   }
]);