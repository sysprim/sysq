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
            <div class="row right-align">
                <div class="col s3 m2 center-align">
                    <i class="fas fa-bullhorn" style="font-size: 50px; margin-top: 1rem;"></i>
                </div>
                <div class="col s9 m10">
                    <span style="font-size: 40px; font-weight: bolder;">Atención</span><br>
                    <span>Realizar la llamada por ticket de cliente para cada servicio.</span>
                </div>
            </div>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m3 blue center-align" style="border: solid 1px #cccccc">
                    <h6 class="white-text">Taquilla</h6>
                    <span class="white-text" style="font-size: 70px;">1</span><br>
                    <button class="btn btn-flat white-text">Cambiar</button>
                </div>
                <div class="col s12 m9">

                    <div class="row">
                        <div class="col s12" style="margin-bottom:40px;margin-top:25px;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Ticket</td>
                                        <td>A001</td>
                                    </tr>
                                    <tr>
                                        <td>Servicio</td>
                                        <td>ATENCIÓN AL CLIENTE</td>
                                    </tr>
                                    <tr>
                                        <td>Documento</td>
                                        <td>V28286639</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col s12 m4 animated bounceIn">
                            <a href="" class="btn-app white black-text">
                                <i class="fas fa-bullhorn"></i>
                                <span style="font-size: 16px;">Llamar de Nuevo</span>
                            </a>
                        </div>
                        <div class="col s12 m4 animated bounceIn">
                            <a href="" class="btn-app white black-text">
                                <i class="fas fa-play"></i>
                                <span style="font-size: 16px;">Iniciar Atención</span>
                            </a>
                        </div>
                        <div class="col s12 m4 animated bounceIn">
                            <a href="" class="btn-app white black-text">
                                <i class="fas fa-user-times"></i>
                                <span style="font-size: 16px;">No se presentó</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal va en una seccion aparte, solo que aqui esta la prueba -->
            <div id="modal1" class="modal">
                <div class="modal-content blue-text center-align">
                    <div class="row">
                        <div class="col s12 center-align">
                            <span style="font-size:50px;">Ticket</span>
                        </div>
                        <div class="col s12 center-align">
                            <span style="font-size: 80px; font-weight: 900">A002</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer blue white-text row">
<div class="col s12 center-align blue">
                        <span style="font-size:50px;">TAQUILLA 3</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="collection with-header">
                        <div class="collection-header"><h5>Mi Fila (Todos)</h5></div>
                        {{-- No BOOOOORRRRRARR --}}
                        <a href="#modal1" class="collection-item avatar modal-trigger">
                            <i class="circle blue fas fa-user"></i>
                            <span class="title">A002</span><br>
                            <span class="title">282886639</span>
                        </a>
                        <a href="" class="collection-item avatar">
                            <i class="circle blue fas fa-user"></i>
                            <span class="title">A002</span><br>
                            <span class="title">282886639</span>
                        </a>
                        <a href="" class="collection-item avatar">
                            <i class="circle blue fas fa-user"></i>
                            <span class="title">A002</span><br>
                            <span class="title">282886639</span>
                        </a>
                        <a href="" class="collection-item avatar">
                            <i class="circle blue fas fa-user"></i>
                            <span class="title">A002</span><br>
                            <span class="title">282886639</span>
                        </a>
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