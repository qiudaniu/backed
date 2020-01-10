<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ URL::asset('public/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="{{ URL::asset('public/css/orionicons.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ URL::asset('public/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ URL::asset('public/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png?3') }}">
    <!-- Tweaks for older IEs-->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>

<!-- JavaScript files-->
<script src="{{ URL::asset('public/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('public/vendor/popper.js/umd/popper.min.js') }}"> </script>
<script src="{{ URL::asset('public/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('public/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
<script src="{{ URL::asset('public/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ URL::asset('public/js/js.cookie.min.js') }}"></script>
<script src="{{ URL::asset('public/js/charts-home.js') }}"></script>
<script src="{{ URL::asset('public/js/front.js') }}"></script>
@yield('javaScript')
</body>
</html>
