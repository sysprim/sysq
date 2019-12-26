
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
        <div class="col s9 m9 l9 marginCol">
                <div class="row marginCol">
                    <div class="col s12 m12 l12 " style="padding:0">
                        <div class="video-container">
                            @if($videoPanel)
                            
                            <video id="videoPanel"  frameborder="0" allowfullscreen loop autoplay>
                                <source src="{{ route('view.video' ,['filename'=>$videoPanel->video_path])}}">
                            </video>
                            
                            @else
                            <video id="videoPanel" width="100%" height="auto"  frameborder="0" allowfullscreen loop autoplay>
                                <source src="{{asset('img/big_buck_bunny.mp4')}}">
                            </video>
                            @endif                
                        </div>
                    </div>
                </div>
            

        <div class="row marginCol">
            <div class="col s12 m12 l12 " style="padding:0" >   
                <div class=" page-footer" style="background-color:#1860ab">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col s12 m12 l12">
                               <marquee behavior="" direction=""><b id="notice">Cintillo de Noticia:</b></marquee>
                            </div>
                        </div>

                        <div class="row" style="display:none" id="editNoticePanel">
                            <div class="input-field col s12 m12 l12" style="padding:20px;">
                               <input type="text" id="noticeCam" name="noticeCam" class="white-text">
                               <label for="noticeCam" class="white-text">Cambiar Noticias</label>
                               <button type="button" class="btn white black-text" id="camNotice">Cambiar</button>
                            </div>
                        </div>

                        <div class="row" style="margin-top:20px;">
                            <div class="col s6 m6 l6" style="float:left">
                                <div id="liveclock" class="outer_face">
                                    <div class="marker oneseven"></div>
                                    <div class="marker twoeight"></div>
                                    <div class="marker fourten"></div>
                                    <div class="marker fiveeleven"></div>
                         
                                    <div class="inner_face">
                                        <div class="hand hour"></div>
                                        <div class="hand minute"></div>
                                        <div class="hand second"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col s6 m6 l6 left-align" style="margin-top:30px">
                                <div class="date">
                                    <span id="weekDay"  class="weekDay  "></span><span>,   </span><br>
                                    <span id="month"    class="month    "></span><span > del</span>
                                    <span id="year"     class="year     "></span>
                                </div>               
                            </div>
                 
                        </div>
                    </div>

                <div class="row" style="margin-top:20px">
                    <div class="col s6 m6 l6">
                        <div class="container">
                         <p> © 2019 Tecnova-Ve</p> 
                        </div>
                      </div>

                      <div class="col s2 m2 l2 offset-l4">
                        
                            <img style="width:50px; height:40px" src="{{asset('img/sysQ blanco icono.png')}}" alt=""> 
                        
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>


        <div class="col s3 m3 l3 marginCol">
            
                <div class="row marginCol">
                    <div class="col s12 m12 l12 green accent-4 center-align marginCol">
                        <h4 class="flow-text" style="font-weight:bold;">Llamados</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col s6 m6 l6 center-align marginCol" style="background-color:#1860ab">
                        <h4 class="flow-text">Turno</h4>
                    </div>
                    <div class="col s6 m6 l6 center-align marginCol" style="background-color:#1860ab">
                        <h4 class="flow-text">Taquilla</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col s8 m8 l8 grey lighten-3 marginCol" id="code_random">
                        <div id="codeRandom"></div>
                    </div>
                    <div class="col s4 m4 l4 center-align grey lighten-3 marginCol" id="ticket_number">
                        <div id="ticketNumber"></div>
                    </div>
                </div>


                    <div class="row marginCol">
                        <div class="col s12 m12 l12 yellow darken-2 center-align marginCol">
                            <h4 class="flow-text" style="font-weight:bold;">En Atención</h4>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col s6 m6 l6 center-align marginCol" style="background-color:#1860ab">
                            <h4 class="flow-text">Turno</h4>
                        </div>
                        <div class="col s6 m6 l6 center-align marginCol" style="background-color:#1860ab">
                            <h4 class="flow-text">Taquilla</h4>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col s8 m8 l8 grey lighten-3 marginCol" id="code_random">
                            <div id="codeAttend"></div>
                        </div>
                        <div class="col s4 m4 l4 center-align grey lighten-3 marginCol" id="ticket_number">
                            <div id="ticketAttend"></div>
                        </div>
                    </div>

            <div class="row">
                <div class="col s12 m12 l12 red center-align marginCol">
                    <h4 class="flow-text">En Espera</h4>
                </div>
            </div>

            <div class="row">
                <div class="col s6 m6 l6 center-align marginCol" style="background-color:#1860ab">
                    <h4 class="flow-text" style="margin-left:10xp">Turno</h4>
                </div>
                <div class="col s6 m6 l6 center-align marginCol" style="background-color:#1860ab">
                    <h4 class="flow-text" >Taquilla</h4>
                </div>
            </div>

            <div class="row">
                <div class="col s8 m8 l8 grey lighten-3 marginCol">
                    <div id="codeWaiting"></div>
                </div>
                <div class="col s4 m4 l4 center-align grey lighten-3 marginCol">
                    <div id="ticketWaiting"></div>
                </div>
            </div>
            
           
        </div>
    </main>
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
            <div class="modal-content center-align" style="color:#1860ab">
                <div class="row">
                    <div class="col s12 center-align">
                        <span style="font-size:50px;">Presentarse:</span>
                    </div>
                    <div class="col s12 center-align">
                        <div style="font-size: 80px; font-weight: 500" id="ciClienteModal" ></div>
                        <div style="font-size: 40px; font-weight: 900" id="randomCodeModal" ></div>
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




