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
                            <li><a href="#" class="black-text tooltipped" data-position="bottom" data-tooltip="Turnos"><i class="icon-slow_motion_video"></i></a></li>
                            <li><a href="#" class="black-text tooltipped" data-position="bottom" data-tooltip="Usuarios"><i class="icon-supervisor_account"></i></a></li>
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
                <div class="col s12">
                    <div class="collection with-header">
                        <div class="collection-header"><h5>Usuarios Registrados</h5></div>
                        
                        <table class="white centered highlight responsive-table" id="Material">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Detalles</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
        
                                 @if(empty($users))
                                <tbody>
                                    <tr>
                                        <td colspan="5"><p>No hay datos registrados</p></td>
                                    </tr>
                                </tbody>

                                @else @foreach ($users as $user)
                                
                                <tbody> 
                                          
                                   <tr>
                                        <td>{{ $user->name }} </td>
                                        <td>{{ $user->email }}</td>

                                        <td>
                                            
                                            <a href="{{ route('detalle', ['id' => $user->id]) }}" class="btn btn-small btn-floating blue waves-effect effect-light"><i class="icon-pageview"></i></a>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-small btn-floating red waves-effect effect-light"><i class="icon-delete"></i></a>
                                        </td>
                                    </tr> 
                                     
                                     @endforeach 
                                     @endif  
                                </tbody>
                            </table>
                        
                                              
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