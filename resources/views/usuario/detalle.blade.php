<!DOCTYPE html>
<html lang="en">
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

    <main>
        <div class="container-fluid" style="margin-top:20px;">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                <div class="card">

                    <div class="card-header">
                        <span class="card-title">Detalles</span> 
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{-- route('update')--}}" enctype="multipart/form-data" aria-label="Configuración de mi cuenta">
                            @csrf
    
                            <div class="row" style="margin-top:20px;" >
                                <div class="form-group col s8 offset-s1">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                    <input id="name" type="text" {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>
    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
    
                                <div class="col s8 offset-s1">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Agregado') }}</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
      
                                <div class="row " style="padding:20px;">
                                    <div class="col s12 m8">
                                        <button type="submit" class="btn blue">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- JavaScript files -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/owner.js"></script>
    <script src="js/inicializar.js"></script>

</body>
</html>