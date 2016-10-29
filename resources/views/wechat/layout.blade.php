<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/city-picker.css" rel="stylesheet">
    <style type="text/css">
        #app {
            padding-top: 50px;
        }
    </style>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
    @include('wechat.partial.nav')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
@include('backend.partial.message')
        @yield('content')
        </div>
    </div>
</div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/city-picker.data.js"></script>
    <script src="/js/city-picker.js"></script>
    <script src="/js/jquery.bootstrap-touchspin.min.js"></script>
    @yield('js')
</body>
</html>
