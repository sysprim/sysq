@extends('layouts.app')

@section('content')

<body class="grey lighten-3 font-nunito">
    <main>
        <div class="container-fluid" style="margin-top:20px;">
            <div class="row">
                <div class="col s12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="">Ayuda</a></li>
                    </ul>
                </div>
                <div class="col s12">
                        <h4 class="title">Bienvenido {{Auth::user()->name. "-". Auth::user()->email }}</h4>
                    </div>

                    @include('includes.message')

                    <div class="col s12">
                        <div class="card">
                            <ul id="tabs-swipe-demo" class="tabs">
                                <li class="tab col s12 m3"><a href="#usuario"  style="color:#0288d1">Usuarios</a></li>
                                <li class="tab col s12 m3"><a href="#taquilla" style="color:#0288d1">Taquillas</a></li>
                                <li class="tab col s12 m3"><a href="#menu"     style="color:#0288d1">Registrar</a></li>
                                <li class="tab col s12 m3"><a href="#configuracion"     style="color:#0288d1">Configuración</a></li>
                            </ul>
                            <div class="card-content row" id="usuario">
                                <div class="col s12">
                                    @if(empty($users))
                                    <h4 class="center-align">No hay usuarios registrados.</h4>
                                    @else
                                    <h4>
                                        <i class="icon-account_circle blue-text"></i>
                                        Usuarios Registrados
                                    </h4>
                                    @endif
                                </div>
                                <table class="centered striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Detalles</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <input type="hidden" value="{{$user->id}}"  id="user" >
                                            <td>{{ $user->name }} </td>
                                            <td>{{ $user->email }}</td>
                                            <td>                                          
                                                <a href="{{ route('detail.user', ['id' => $user->id]) }}" class="btn btn-small btn-floating blue waves-effect effect-light"><i class="icon-pageview"></i></a>
                                                </td>
                                        </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-content row" id="taquilla">
                                <div class="col s12">
                                    @if(empty($tickets))
                                    <h4 class="center-align">No hay taquillas registradas.</h4>
                                    @else
                                    <h4>
                                        <i class="icon-assignment blue-text"></i>
                                        Taquillas Registradas
                                    </h4>
                                    @endif
                                </div>
                                <table class="centered striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Número</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Detalles</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>{{ $ticket->number_ticket }} </td>
                                            <td>{{ $ticket->name_ticket }} </td>
                                            <td>{{ $ticket->description_ticket }}</td>                                       
                                            <td>                                          
                                                <a href="{{ route('detail.ticket', ['id' => $ticket->id]) }}" class="btn btn-small btn-floating blue waves-effect effect-light"><i class="icon-pageview"></i></a>
                                            </td>
                                        </tr> 
                                        @endforeach
                                    </tbody>
                                    </table>
                                <div class="col s12">
                                </div>
                            </div>
                            <div class="card-content row" id="menu">
                                <div class="col s12">
                                    <h4>Seleccione:</h4>
                                </div>
                                <div class="col s6">
                                    <a href="{{ route('register') }}" class="btn-app white waves-effect small orange-text" >
                                        <i class="icon-assignment_ind"></i>
                                        Usuarios
                                    </a>
                                </div>
                                <div class="col s6">
                                    <a href="{{ route('register.ticket') }}" class="btn-app white green-text">
                                        <i class="icon-assignment"></i>
                                        Taquillas
                                    </a>
                                </div>
                            </div>
                            <div class="card-content row" id="configuracion">
                                <div class="col s12">
                                    <h4>
                                        <i class="icon-settings blue-text"></i>
                                        Configuración
                                    </h4>
                                </div>
                                <div class="col s6">
                                    <a href="#" id="reset" class="btn-app white waves-effect small red-text" >
                                        <i class="icon-autorenew"></i>
                                        Cancelar Turnos
                                    </a>
                                </div>
                                <div class="col s6">
                                    <a href="#" class="btn-app white lighten-1 blue-text" disabled>
                                        <i class="icon-trending_up"></i>
                                        Estadísticas
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>           
                </div>
            </div>
        </div>
            <script src="{{ asset('js/data/turn.js') }}"></script>
    </div>
</main>

 @endsection