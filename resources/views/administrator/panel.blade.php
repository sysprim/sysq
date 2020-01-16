
@extends('layouts.app')

@section('content')

<script src="{{ asset('js/data/panel.js') }}"></script>

<main>
        <div class="container-fluid" style="margin-top:20px;">
            <div class="row left-align alert alert-info">
                <div class="col s4 m3 center-align">
                    <i class="fas fa-exclamation-circle  " style="margin-left:10px;font-size: 70px; margin-top: .5rem;"></i>
                </div>
                <div class="col s8 m9 ">
                    <span style="font-size: 40px; font-weight: bolder;">Atención</span><br>
                    <span id="info">Realizar la llamada por ticket de cliente para cada servicio.</span>
                </div>
            </div>
            <div class="divider"></div>
            @if($ticket)
            <div class="row">
                    <div class="col s12 m3">
                        <input type="hidden" id="idTicket" value="{{ $ticket->id }}">
                        <div class="row">
                            <div class="col s12 m12 center-align" style="background-color:#1860ab;border: solid 1px #cccccc">
                            <h6 class="white-text">Taquilla</h6>
                                <span class="white-text" style="font-size: 70px;">{{$ticket->number_ticket}}</span><br>
                            <a href="#taquilla" class="btn btn-flat white-text modal-trigger">Cambiar</a>
                            </div>
                        </div>
                </div>

                    <div class="col s12 m9">
                        <input type="hidden" id="idTurn">
                            <div class="row">
                                <div class="row" style="margin-left:10px;">
                                    <div class="col s12 m12" id="infoTicket" style="margin-bottom:40px;margin-top:25px;">
                                        <input type="hidden" value="{{$ticket->id}}" id="idTicket">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Numero Taquilla</td>
                                                    <td>{{$ticket->number_ticket}}</td>
                                                </tr>
                                                <tr>
                                                    <td id="nameTurn">Descripción</td>
                                                    <td id="numberTurn">{{$ticket->description_ticket}}</td>
                                                </tr>
                                                <tr id="clientCall" style="display: none">
                                                    <td>Cliente</td>
                                                    <td id="ciClient"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                     </div>
                                </div>

                            <div class="row" style="margin-top: 20px;">
                                <div class="col s12 m12 animated bounceIn" id="block_llamar">
                                    <button type="button"  id="llamar" style="border:none;" class="waves-effect btn-app white black-text">
                                        <i class="fas fa-bullhorn" style="color:#ffb300"></i>
                                        <span style="font-size: 16px;" id="text_llamar">Llamar</span>
                                    </button>
                                </div>
                                <div class="col s12 m6 animated bounceIn" id="block_iniciar">
                                    <button type="button" id="iniciar" style="border:none;display:none;" class="waves-effect btn-app white black-text ">
                                        <i class="fas fa-play" style="color:#1860ab"></i>
                                        <span style="font-size: 16px;">Iniciar Atención</span>
                                    </button>
                                </div>
                                <div class="col s12 m4 animated bounceIn" id="block_cancelar">
                                    <button type="button" id="cancelar" style="border:none;display:none;" class="waves-effect btn-app white black-text">
                                        <i class="fas fa-user-times red-text"></i>
                                        <span style="font-size: 16px;">No se presentó</span>
                                    </button>
                                </div>
                                <div class="col s12 m4 animated bounceIn" id="block_finalizar">
                                        <button type="button" id="finalizar" style="border:none;display:none;" class="waves-effect btn-app white black-text">
                                            <i class="fas fa-times-circle green-text"></i>
                                            <span style="font-size: 16px;">Finalizar</span>
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>


                            <div class="row">
                                <div class="col s12">
                                    <div class="collection with-header" >
                                        <div class="collection-header"><h5>Mi Fila</h5></div>
                                            <div id="turnPanel" >

                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

            @else
            <div class="row">
                <div class="col s12 m3 center-align" style="background-color:#1860ab" style="border: solid 1px #cccccc">
                    <h6 class="white-text">Taquilla</h6>
                <span class="white-text" style="font-size: 70px;">0</span><br>
                    <a href="#taquilla" class="btn btn-flat white-text modal-trigger">Cambiar</a>
                </div>
                        <div class="col s12 m9" style="margin-bottom:200px;margin-top:25px;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Seleccione una taquilla o registre en el menu de configuración</td>
                                        <td>0000</td>
                                    </tr>
                                    <tr>
                                        <td>0000</td>
                                        <td>0000</td>
                                    </tr>
                                    <tr>
                                        <td>0000</td>
                                        <td>0000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            @endif
    </div>

  <!-- Modal Structure -->
        <div id="taquilla" class="modal bottom-sheet">
                <div class="modal-content">
                    <div class="row">
                        <div class="centered col s12 m12">
                            <h5 style="margin-left:15px;">  Taquillas </h5></div>
                        </div>
                    </div>

        @if($ticketAll)
                <div class="row">
                    <div class="col s12 m12">
                        <ul class="collection">
                        @foreach ($ticketAll as $tickets)
                            @if($tickets->status_ticket=="Activa")
                            <li class="collection-item avatar">
                                <i class="icon-local_convenience_store circle orange"></i>
                                <span class="title">{{$tickets->number_ticket}}</span>
                                <p>
                                   {{$tickets->description_ticket}}
                                </p>
                            <a href="{{route('panel.select', ['id'=>$tickets->id])}}" class="btn secondary-content red" >Seleccionar</a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

        @else
                <div class="row">
                    <div class="col s12 m12">
                        <span class="black-text">No hay taquillas</span>
                    </div>
                </div>
        @endif

            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">cerrar</a>
            </div>
        </div>
    </div>
            <!-- Modal va en una seccion aparte, solo que aqui esta la prueba -->

            <div id="ticket" class="modal">
                    <div class="modal-content center-align" style="color:#1860ab">
                        <div class="row">
                            <div class="col s12 center-align">
                                <span style="font-size:50px;">Ticket</span>
                            </div>
                            <div class="col s12 center-align">
                                <span style="font-size: 80px; font-weight: 900" id="infoCode" >A002</span>
                            </div>
                        </div>
                    </div>
                </div>

                <audio class="audio">
                    <source src="{{asset('img/turn.mp3')}}" type="audio/ogg">
                </audio>

    </main>

@endsection
