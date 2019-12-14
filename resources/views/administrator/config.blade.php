@extends('layouts.app')

@section('content')

<body class="grey lighten-3 font-nunito">
    <main>
        <div class="container-fluid" style="margin-top:20px;">
            <div class="row">
                <div class="col s12">

                        <div class="row">
                                <div class="col s12 m12">
                                    <h4 class="title">Bienvenido {{Auth::user()->name. "-". Auth::user()->email }}</h4>
                                </div>
                            </div>

                    @include('includes.message')

                    <ul id="tabs-swipe-demo" class="tabs">
                        <li class="tab col s12 m4"><a href="#usuario"  style="color:#0288d1">Usuarios</a></li>
                        <li class="tab col s12 m4"><a href="#taquilla" style="color:#0288d1">Taquillas</a></li>
                        <li class="tab col s12 m4"><a href="#menu"     style="color:#0288d1">Registrar</a></li>
                    </ul>
                
                <div class="collection white with-header row" style="margin:0;" id="menu">
                    <div class="collection-header">
                            <div class="row" style="margin:0;">
                                    <div class="col s12 m1 right">
                                        <i class="icon-trending_up medium blue-text" style="text-aling:center"></i>
                                    </div>

                                    <div class="centered col s12 m11">
                                        <h5 style="margin-left:15px;margin-top:15px;">  Registrar o Visualizar Estadisticas</h5></div>
                                    </div>
                                </div>
                                         
                        <div class="row" style="padding:20px;">
                            <div class="col s12 m4">
                                <a href="{{ route('register') }}" class="btn-app white waves-effect small orange-text" >Usuarios<i class="icon-assignment"></i></a>
                            </div>

                            <div class="col s12 m4">
                                <a href="{{ route('register.ticket') }}" class="btn-app white green-text">Taquillas<i class="icon-assignment_ind"></i></a>
                            </div>

                            <div class="col s12 m4">
                                <a href="#" class="btn-app white lighten-1 blue-text" disabled>Estadisticas<i class="icon-trending_up"></i></a>
                            </div>              
                        </div>
                </div>
                    
                                       
                    <div class="collection with-header" id="usuario" style="margin:0">
                        <div class="collection-header">
                            <div class="row" style="margin:0;">
                                    <div class="col s12 m1 right">
                                        <i class="icon-account_circle medium blue-text" style="text-aling:center"></i>
                                    </div>

                                    <div class="centered col s12 m11">
                                        <h5 style="margin-left:15px;margin-top:15px;">  Usuarios Registrados</h5></div>
                                    </div>
                                </div>

                        <table class="white centered highlight responsive-table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Detalles</th>
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
                                          <input type="hidden" value="{{$user->id}}"  id="user" >
                                   <tr>
                                        <td>{{ $user->name }} </td>
                                        <td>{{ $user->email }}</td>

                                        <td>                                          
                                            <a href="{{ route('detail.user', ['id' => $user->id]) }}" class="btn btn-small btn-floating blue waves-effect effect-light"><i class="icon-pageview"></i></a>
                                        </td>
                                    </tr> 
                                     
                                     @endforeach 
                                     @endif  
                                </tbody>
                            </table>                                   
                    </div>                   
                

                <div class="collection with-header" id="taquilla" style="margin:0">
                        <div class="collection-header">
                            <div class="row" style="margin:0;">

                                <div class="col s12 m1 right">
                                    <i class="icon-assignment medium blue-text" style="text-aling:center"></i>
                                </div>

                                <div class="centered col s12 m11">
                                    <h5 style="margin-left:15px;margin-top:15px;">  Taquillas Registradas</h5></div>
                                </div>
                            </div>
                            
                            <table class="white centered highlight responsive-table">
                                <thead>
                                    <tr>
                                        <th>Número</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Detalles</th>
                                    </tr>
                                </thead>
    
                                @if(empty($tickets))
                                <tbody>
                                    <tr>
                                        <td colspan="4"><p>No hay datos registrados</p></td>
                                    </tr>
                                </tbody>

                                @else @foreach ($tickets as $ticket)
                            
                                <tbody>                                       
                                    <tr>
                                        <td>{{ $ticket->number_ticket }} </td>
                                        <td>{{ $ticket->name_ticket }} </td>
                                        <td>{{ $ticket->description_ticket }}</td>                                       
                                        <td>                                          
                                        <a href="{{ route('detail.ticket', ['id' => $ticket->id]) }}" class="btn btn-small btn-floating blue waves-effect effect-light"><i class="icon-pageview"></i></a>
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
    </div>
</main>

 @endsection