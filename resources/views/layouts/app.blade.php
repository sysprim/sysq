<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SysQ - Sistema para Colas</title>

    <!-- CSS files -->
    
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material-components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material-gradient.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owner.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

     <!-- JavaScript files -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/owner.js"></script>
    <script src="js/inicializar.js"></script>

</head>

<body class="grey lighten-3 font-nunito">
    <!-- Header -->
    <header>
        <nav class="white container-fluid">
            <div class="nav-wrapper">
                    <a href="{{ route('index')  }}" class="brand-logo font-audiowide left deep-purple-text text-darken-2">SysQ</a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                                <li><a href="{{ route('panel') }}" class="black-text tooltipped" data-position="bottom" data-tooltip="Panel"><i class="icon-account_circle"></i></a></li>
                            <li><a href="{{route('turno')}}" class="black-text tooltipped" data-position="bottom" data-tooltip="Turnos"><i class="icon-slow_motion_video"></i></a></li>
                            <li><a href="{{ route('config')}}" class="black-text tooltipped" data-position="bottom" data-tooltip="Usuarios"><i class="icon-supervisor_account"></i></a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="black-text tooltipped" data-position="bottom" data-tooltip="Cerrar Sesión"><i class="icon-exit_to_app"></i></a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                             </form>
                            </li>
                            {{-- <li><a href="collapsible.html">JavaScript</a></li> --}}
                        </ul>
                    </div>
                </nav>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
