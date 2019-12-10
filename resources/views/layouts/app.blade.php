<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SysQ</title>

    <!-- JavaScript files -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/owner.js') }}"></script>
    <script src="{{ asset('js/inicializar.js') }}"></script>


    <!-- CSS files -->
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material-components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material-gradient.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owner.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

</head>
<body class="grey lighten-3 font-nunito">
    <div id="app">
            <header>
                    <nav class="white container-fluid">
                        <div class="nav-wrapper">
                            <a href="{{ route('home') }}" class="black-text right tooltipped" data-position="bottom" data-tooltip="Entrar al Sistema"><i class="small icon-account_circle " style="display:inline-block"></i></a>
                            <a href="{{ route('index') }}" class="brand-logo tooltipped font-audiowide left deep-purple-text text-darken-2" data-position="bottom" data-tooltip="Inicio" >SysQ</a>
                        </div>
                    </nav>
                </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
