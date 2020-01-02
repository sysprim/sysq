@extends('layouts.app')

@section('content')

    <main>
        <div class="container-fluid" style="margin-top:20px;">
            <div class="row">
                <div class="col s12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('panel')}}">Panel</a></li>
                        <li class="breadcrumb-item"><a href="#">Configuración</a></li>
                    </ul>
                </div>
                <div class="col s12">
                        <h4 class="title">Bienvenido {{Auth::user()->name. "-". Auth::user()->email }}</h4>
                    </div>

                    <div class="col s12">

                        @include('includes.message')
                        <div class="card">
                            <ul id="tabs-swipe-demo" class="tabs">
                                <li class="tab col s12 m3 "><a href="#usuario"  style="color:#0288d1">Usuarios</a></li>
                                <li class="tab col s12 m3 "><a href="#taquilla" style="color:#0288d1">Taquillas</a></li>
                                <li class="tab col s12 m3"><a href="#menu"     style="color:#0288d1">Registrar</a></li>
                                <li class="tab col s12 m3"><a href="#configuracion"     style="color:#0288d1">Configuración</a></li>
                            </ul>
                            <div class="card-content row" id="usuario">
                                <div class="col s12">
                                    @if(empty($users))
                                    <h4 class="center-align">No hay usuarios registrados.</h4>
                                    @else
                                    <h4>
                                        <i class="icon-account_circle" style="color:#1860ab"></i>
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
                                                <a href="{{ route('detail.user', ['id' => $user->id]) }}" class="btn btn-small btn-floating waves-effect effect-light" style="background-color:#1860ab"><i class="icon-pageview"></i></a>
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
                                        <i class="icon-assignment" style="color:#1860ab"></i>
                                        Taquillas Registradas
                                    </h4>
                                    @endif
                                </div>
                                <table class="centered striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Número</th>
                                            <th>Descripción</th>
                                            <th>Estado</th>
                                            <th>Detalles</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>{{ $ticket->number_ticket }} </td>
                                            <td>{{ $ticket->description_ticket }}</td>
                                            <td>
                                            @if($ticket->status_ticket == "Activa")
                                                <span style="margin-right: 5px;"><strong>{{$ticket->status_ticket}}</strong></span>


                                                <a href="{{ route('status.ticket', ['id' => $ticket->id, 'status'=>'Deshabilitado']) }}" class="ActDis btn btn-small btn-floating green waves-effect effect-light tooltipped" data-position="left" data-tooltip="Deshabilitar"><i class="icon-check"></i></a>
                                            @else
                                                <span style="margin-right: 5px;"><strong>{{$ticket->status_ticket}}</strong></span>

                                                <a href="{{ route('status.ticket', ['id' => $ticket->id, 'status'=>'Activa']) }}" class="ActDis btn btn-small btn-floating red waves-effect effect-light tooltipped" data-position="left" data-tooltip="Activar"><i class="icon-close"></i></a>
                                            @endif
                                            </td>                                       
                                            <td>                                          
                                                <a href="{{ route('detail.ticket', ['id' => $ticket->id]) }}" class="btn btn-small btn-floating waves-effect effect-light" style="background-color:#1860ab"><i class="icon-pageview"></i></a>
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
                                    <a href="{{ route('register') }}" class="btn-app white waves-effect  truncate" style="color:#1860ab" >
                                        <i class="icon-assignment_ind"></i>
                                        Usuarios
                                    </a>
                                </div>
                                <div class="col s6">
                                    <a href="{{ route('register.ticket') }}" class="btn-app white green-text truncate">
                                        <i class="icon-assignment"></i>
                                        Taquillas
                                    </a>
                                </div>
                            </div>
                            <div class="card-content row" id="configuracion">
                                <div class="col s12">
                                    <h4>
                                        <i class="icon-settings" style="color:#1860ab"></i>
                                        Configuración
                                    </h4>
                                </div>
                                <div class="col s6">
                                    <a href="#" id="reset" class="btn-app white waves-effect small red-text truncate" >
                                        <i class="icon-autorenew"></i>
                                        Cancelar Turnos
                                    </a>
                                </div>
                                <div class="col s6">
                                    <a href="{{route('index.video')}}" class="btn-app white lighten-1 orange-text truncate" disabled>
                                        <i class="icon-ondemand_video"></i>
                                        Videos
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