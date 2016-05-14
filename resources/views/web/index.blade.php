<!DOCTYPE html>
<html lang="en" ng-app="FuelMeterWeb">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplicação para inserção e visualização de amostras feitas em postos da cidade">
    <meta name="author" content="Diego Rodrigues <diego.mrodrigues@outlook.com>">

    <title>Fuel Meter Web</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<%$STATIC_URL%>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<%$STATIC_URL%>/bower_components/materialize/css/materialize.min.css" rel="stylesheet">
    <link href="<%$STATIC_URL%>/css/the-big-picture.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArWpNmdWlTIhhgD24vSdGy7zOs_QNTefY">
    </script>

    <script src="<%$STATIC_URL%>/bower_components/jquery/dist/jquery.js"></script>
    <script src="<%$STATIC_URL%>/bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<%$STATIC_URL%>/bower_components/materialize/js/materialize.js"></script>
    <script src="<%$STATIC_URL%>/bower_components/angular/angular.js"></script>
    <script src="<%$STATIC_URL%>/bower_components/angular-route/angular-route.js"></script>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Fuel Meter Web</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#/data">Dados</a>
                </li>
                <li>
                    <a href="#/about">Sobre</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container">
    <div class="row" ng-view>

    </div>

    <a href="#/new" style="position: absolute; right: 25px; bottom: 80px;" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>

</div>


<input type="hidden" id="APP_URL" value="<%$APP_URL%>">
<input type="hidden" id="CSRF_TOKEN" value="<% csrf_token() %>">

<script src="<%$STATIC_URL%>/dist/0.0.1/FuelMeterWeb.js"></script>

</body>

</html>
