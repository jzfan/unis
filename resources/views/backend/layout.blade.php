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
<link href="/c_files/bootstrap.min.css" rel="stylesheet">
<link href="/c_files/cropper.min.css" rel="stylesheet">
<link href="/c_files/main.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/city-picker.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/select2.css">
    <link rel="stylesheet" href="/css/select2-bootstrap.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/dataTables.min.css">
    <link rel="stylesheet" href="/css/buttons.dataTables.min.css">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container-fluid">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img alt="Brand" src="http://temp.im/30x30/007AFF/fff">
                        </a>
                        <span class='navbar-brand'>   
                            {{ config('app.name', 'Laravel') }}
                        </span>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                            <li><a href="{{ url('/') }}">前台</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                 <img src='/img/default-avatar.png' class='avatar-small'> {{ Auth::user()->name }} <span class="caret"></span>
                             </a>

                             <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            @include('backend.admin.partial.nav')
            <div class="col-sm-9 col-md-10">
                @include('backend.admin.partial.message')
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->

<script src="/c_files/jquery.min.js"></script>
<script src="/c_files/bootstrap.min.js"></script>

<script src="/js/city-picker.data.js"></script>
<script src="/js/city-picker.js"></script>
<script src="/js/select2.js"></script>
<script src="/js/dataTables.min.js"></script>
<script src="/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
<script src="/c_files/cropper.min.js"></script>
<script src="/c_files/main.js"></script>
@yield('js')
</body>
</html>
