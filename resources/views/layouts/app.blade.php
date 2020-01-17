<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SysQ - Sistema para Colas</title>

    <!-- CSS files -->
    
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material-components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material-gradient.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/sysQ icono.png') }}" type="image/x-icon">
    <style>
        @media only screen and (max-width: 992px) {
            i.nav-icons {
                height: 56px !important;
                line-height: 56px !important;
            }
        }
    </style>

     <!-- JavaScript files -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/owner.js') }}"></script>
    <script src="{{ asset('js/initialize.js') }}"></script>

</head>

<body class="grey lighten-3 font-OpenSans">
    @include('includes.preloader')
    <!-- Header -->
    <header>
        @include('includes.app.header')   
    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <footer>
    @include('includes.app.footer')
    </footer>

</body>

    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

    </style>
    
</html>
