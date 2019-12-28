
<!DOCTYPE html>
<html lang="es">
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
    <link rel="stylesheet" href="{{ asset('css/turno.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/sysQ-icono.ico') }}" type="image/x-icon">
</head>
<body class="grey lighten-3">

    @include('includes.preloader')
<main>
    <div class="row marginCol">
        <div class="col s8 m8 marginCol">
                <div class="row marginCol">
                    <div class="col s12 m12 " style="padding:0;height: 80%";>
                        <div class="video-container">
                            @if($videoPanel)
                            
                            <video id="videoPanel" width="100%" height="auto"  frameborder="0" allowfullscreen loop autoplay>
                                <source src="{{ route('view.video' ,['filename'=>$videoPanel->video_path])}}">
                            </video>
                            
                            @else
                            <video id="videoPanel" width="100%" height="auto"  frameborder="0" allowfullscreen loop autoplay>
                                <source src="{{asset('img/Video corto de naturaleza.mp4')}}">
                            </video>
                            @endif                
                        </div>
                    </div>
                </div>

        <div class="row">
            <div class="col s12 m12 red">
                <marquee behavior="" direction=""><b id="notice" style="color: #fff; font-size: 40px">Cintillo de Noticia:</b></marquee>
            </div>
        </div>
            

        
</div>


        <div class="col s4 m4 marginCol">
            
                <div class="row marginCol">
                    <div class="col s12 m12 l12 green accent-4 center-align marginCol">
                        <h4 class="flow-text" style="font-weight:bold;">Llamados</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col s6 m6 center-align marginCol" style="background-color:#1860ab">
                        <h4 class="flow-text">Turno</h4>
                    </div>
                    <div class="col s6 m6 center-align marginCol" style="background-color:#1860ab">
                        <h4 class="flow-text">Taquilla</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col s8 m8 grey lighten-3 marginCol" id="code_random">
                        <div id="codeRandom"></div>
                    </div>
                    <div class="col s4 m4 center-align grey lighten-3 marginCol" id="ticket_number">
                        <div id="ticketNumber"></div>
                    </div>
                </div>


                    <div class="row marginCol">
                        <div class="col s12 m12 yellow darken-2 center-align marginCol">
                            <h4 class="flow-text" style="font-weight:bold;">En Atención</h4>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col s6 m6 center-align marginCol" style="background-color:#1860ab">
                            <h4 class="flow-text">Turno</h4>
                        </div>
                        <div class="col s6 m6 center-align marginCol" style="background-color:#1860ab">
                            <h4 class="flow-text">Taquilla</h4>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col s8 m8 grey lighten-3 marginCol" id="code_random">
                            <div id="codeAttend"></div>
                        </div>
                        <div class="col s4 m4 center-align grey lighten-3 marginCol" id="ticket_number">
                            <div id="ticketAttend"></div>
                        </div>
                    </div>

            <div class="row">
                <div class="col s12 m12 red center-align marginCol">
                    <h4 class="flow-text">En Espera</h4>
                </div>
            </div>

            <div class="row">
                <div class="col s6 m6 center-align marginCol" style="background-color:#1860ab">
                    <h4 class="flow-text" style="margin-left:10xp">Turno</h4>
                </div>
                <div class="col s6 m6 center-align marginCol" style="background-color:#1860ab">
                    <h4 class="flow-text" style="margin-left:10xp">Cedula</h4>
                </div>
            </div>

            <div class="row">
                <div class="col s4 m4 grey lighten-3 marginCol">
                    <div id="codeWaiting"></div>
                </div>
                <div class="col s8 m8 grey lighten-3 marginCol">
                    <div class="right-align" id="ciWaiting"></div>
                </div>
            </div>
            
           
        </div>
    </main>
</div>

<div class="row marginCol" style="width: 100%">
            <div class="col s12 m12 " style="padding:0" >   
                <div style="background-color:#1860ab;color: #fff">
                    <div class="container-fluid">
                        <div class="row" style="display:none" id="editNoticePanel">
                            <div class="input-field col s12 m12 " style="padding:20px;">
                               <input type="text" id="noticeCam" name="noticeCam" class="white-text">
                               <label for="noticeCam" class="white-text">Cambiar Noticias</label>
                               <button type="button" class="btn white black-text" id="camNotice">Cambiar</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s4 m4" style="float:left;margin-top:20px">
                                    <div class="Widget">
                                        <div class="Fecha">
                                            <div>
                                            <p id="DiaSemana" class="DiaSemana"></p>
                                            </div>
                                            <p id="Dia" class="Dia"></p>
                                            <p> de </p>
                                            <p id="Mes" class="Mes"></p>
                                            <p> del </p>
                                            <p id="Anio" class="Anio"></p>
                                        </div>
                                        
                                    </div>
                            </div>

                            <div class="col s4 m4 center-align" style="margin-top:30px">
                                <div class="Widget">
                                    <div class="Reloj">
                                            <p id="Horas" class="Horas"></p>
                                            <p>:</p>
                                            <p id="Minutos" class="Minutos"></p>
                                            <p>:</p>                                           
                                            <p id="Segundos" class="Segundos"></p>
                                            <p style="font-weight:bold;font-size: 15px;" id="AM-PM" class="AM-PM"></p>
                                            
                                    </div> 
                                </div>              
                            </div>

                            <div class="col s4 m4 center-align" style="margin-top:30px">
                                <div style="margin-left: 30px;">
                                    <img style="width:300px; height:120px" src="{{asset('img/sysQ-blanco.png')}}" alt="">
                                </div> 

                                <div class="container">
                                    <p style="font-size: 20px;"> © 2019 Tecnova-Ve</p> 
                                </div>          
                            </div>
                 
                        </div>
                </div>
            </div>
        </div>
    </div>

<div class="fixed-action-btn" style="z-index: 99999">
    <a href="{{ route('panel') }}" class="btn-floating btn-large red tooltipped" data-position="left" data-tooltip="Panel">
      <i class="icon-account_circle large" style="font-size:50px"></i>
    </a>
      <ul>
          <li><a href="#video" class="btn-floating white tooltipped modal-trigger" style="background-color:##34e064"
              data-position="left" data-tooltip="Seleccionar Video">
              <i class="icon-vertical_align_top large black-text" ></i></a>
          </li>      
          <li><button type="button" value="#video" class="btn-floating tooltipped" style="background-color:#1860ab"
              data-position="left" data-tooltip="Editar Noticias">
              <i class="icon-mode_edit large" id="editNotice"></i></button>
          </li>
          <li><a href="{{route('index.video')}}" class="btn-floating tooltipped orange" data-position="left" data-tooltip="Consultar Videos">
              <i class="icon-ondemand_video"></i></a>
          </li>
      </ul>
  </div>


    <audio class="audio">
        <source src="{{asset('img/turn.mp3')}}" type="audio/ogg">
    </audio>

   

<!-- Modal Structure -->
        <div id="video" class="modal bottom-sheet">
                <div class="modal-content">
                    <div class="row">
                        <div class="centered col s12 m12">
                            <h5 style="margin-left:15px;">  Videos </h5></div>
                        </div>
                    </div>

        @if($video)    
                <div class="row">
                    <div class="col s12 m12">                                              
                        <ul class="collection"> 
                            @foreach ($video as $videos)                           
                            <li class="collection-item avatar">
                                <i class="icon-ondemand_video circle orange"></i>
                                <span class="title">{{$videos->video_path}}</span>
                                <p>{{$videos->description_video}} 
                                </p>
                            <a href="{{route('search.video',['id'=>$videos->id])}}" class="btn secondary-content red" >Cambiar</a>
                        </li>
                        @endforeach
                    </ul>                 
                </div>
            </div>
            
        @else
                <div class="row">
                    <div class="col s12 m12">
                        <span class="black-text">No hay Videos</span>
                    </div>
                </div>
        @endif
                
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">cerrar</a>
            </div>
        </div>

        <div id="turnModal" class="modal">
            <div class="modal-content center-align" style="color:#1860ab;padding: 0;">

                <div class="card z-depth-2" style="margin: 0;">
                        <div class="card-header center-align" style="background-color:#1860ab">
                            <span class="font-audiowide white-text" style="font-size: 60px;">Presentarse:</span>
                        </div>
                        <div class="card-content center-align">
                           <div class="col s12 left-align">
                             <div class="row" style="margin-left: 10px;">
                                <div class="col s4 m4" style="font-size: 80px; font-weight: 500">
                                        <span style="font-size: 80px">Contribuyente</span><br>
                                        <div style="font-size: 70px;" id="ciClienteModal"></div>
                                </div>

                                <div class="col s4 m4 center-align" style="font-size: 80px; font-weight: 500">

                                    <span style="font-size: 80px">Ticket</span><br>
                                    <div style="font-size: 70px;" id="randomCodeModal"></div>
                        
                                </div>

                                <div class="col s4 m4 center-align" style="font-size: 80px; font-weight: 500">
                                    <span style="font-size: 80px">Taquilla</span><br>
                                    <div style="font-size: 70px;" id="numberTicketModal"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        <div class="card-footer center-align" style="background-color:#1860ab">
                            <img style="width:30px; height:30px" src="{{asset('img/sysQ-blanco.png')}}" alt="">
                        </div>
                    </div>
                </div>    
            </div>
        </div>


    

    <!-- JavaScript files -->

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/materialize.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/data/reloj.js') }}"></script>
<script src="{{ asset('js/initialize.js') }}"></script>
<script src="{{ asset('js/owner.js') }}"></script>
<script src="{{ asset('js/data/turn.js') }}"></script>
<script src="{{ asset('js/data/video.js') }}"></script>
   


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

</body>
</html>




