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
    <link rel="stylesheet" href="{{ asset('css/turno.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

    
</head>

<body class="grey lighten-3 font-nunito">
    <!-- Header -->
    <header>
        <div id="slide-out" class="sidenav sidenav-fixed">

            @if($call)   
                <div class="row" style="margin:0">
                    <div class="col s12 m12 green accent-3 center-align">
                        <h4>Llamados</h4>
                    </div>

                <div class="row" style="margin:0">
                    <div class="col s6 center-align blue">
                        <h4>Turno</h4>
                    </div>
                    <div class="col s6 center-align blue">
                        <h4>Taquilla</h4>
                    </div>

                @foreach($call as $callMe)
                    <div class="col s6 center-align grey lighten-2">
                        <h4>{{$callMe->random_code}}</h4>
                    </div>
                    <div class="col s6 center-align grey lighten-2">
                        <h4>{{$callMe->tickets->number_ticket}}</h4>
                    </div>
                @endforeach
                </div>
            </div>

            @else
                <div class="row" style="margin:0">
                    <div class="col s12 m12 green center-align">
                        <h4>Llamados</h4>
                    </div>
                <div class="row">
                    <div class="col s6 center-align blue">
                        <h4>Turno</h4>
                    </div>
                    <div class="col s6 center-align blue">
                        <h4>Taquilla</h4>
                    </div>
                    <div class="col s6 center-align grey lighten-2">
                        <h4>0</h4>
                    </div>
                    <div class="col s6 center-align grey lighten-2">
                        <h4>0</h4>
                    </div>
                </div>
            </div>
            @endif

            @if($turnWaiting)   
                <div class="row" style="margin:0">
                    <div class="col s12 m12 red center-align">
                        <h4>En Espera</h4>
                    </div>

                <div class="row">
                    <div class="col s6 center-align blue">
                        <h4>Turno</h4>
                    </div>
                    <div class="col s6 center-align blue">
                        <h4>Taquilla</h4>
                    </div>

                @foreach($turnWaiting as $turn)
                    <div class="col s6 center-align grey lighten-2">
                        <h4>{{$turn->random_code}}</h4>
                    </div>
                    <div class="col s6 center-align grey lighten-2">
                        <h4>{{$turn->tickets->number_ticket}}</h4>
                    </div>
                @endforeach
                </div>
            </div>
            @else
                <div class="row" style="margin:0">
                    <div class="col s6 center-align blue">
                        <h4>Turno</h4>
                    </div>
                    <div class="col s6 center-align blue">
                        <h4>Taquilla</h4>
                    </div>
                    <div class="col s6 center-align grey lighten-2">
                        <h4>0</h4>
                    </div>
                    <div class="col s6 center-align grey lighten-2">
                        <h4>0</h4>
                    </div>
                </div>
            @endif
        </div>
        <!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="icon-close"></i></a> -->
    </header>
        

    <main>
        {{-- <div class="video-container">
        </div> --}}
            <iframe style="width: 100%; height: auto;" src="https://youtu.be/ZqmIFolThZo" frameborder="0" allowfullscreen></iframe>
        
    </main>

    <footer class="page-footer blue">
        <div class="container-fluid">
            <div class="row">
                <div class="col s12">
                   <marquee behavior="" direction=""><b>Cintillo de Noticia:</b><p id="notice"> Noticias noticia noticias</p></marquee>
                </div>
            </div>
            <div class="row">
                <div class="col s6 left-align">
                    <div class="date">
                        <span><i class="icon-date_range     "></i></span>
                        <span id="weekDay"  class="weekDay  "></span><span>,   </span><br>
                        <span id="month"    class="month    "></span><span > del</span>
                        <span id="year"     class="year     "></span>
                    </div>               
                </div>

                <div class="col s6 right-align">
                    <div class="clock">
                        <span><i class="icon-alarm "></i></span>
                        <span id="hours"    class="hours "></span><span>:</span>
                        <span id="minutes"  class="minutes "></span><span>:</span>
                        <span id="seconds"  class="seconds "></span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="ticket" class="modal">
        <div class="modal-content blue-text center-align">
                 
                @foreach($call as $callMe)
                <input type="hidden" value="{{$callMe->random_code}}" id="codeTurn">
                    <div class="row">           
                        <div class="col s12 center-align">
                            <span style="font-size:50px;">Ticket</span>
                        </div>
                        <div class="col s12 center-align">
                            <span style="font-size: 80px; font-weight: 900" id="codeTurn">{{$callMe->random_code}}</span>
                        </div>
                    </div>
                @endforeach
            
        </div>
    </div>

    <audio class="audio">
        <source src="{{asset('img/turn.mp3')}}" type="audio/ogg">
    </audio>

    <div class="fixed-action-btn" style="z-index: 99999">
      <a href="{{ route('panel') }}" class="btn-floating btn-large red  tooltipped" data-position="left" data-tooltip="Panel">
        <i class="icon-account_circle large" style="font-size:50px"></i>
      </a>
      <!-- <ul>
            <li><button type="button" onclick="myFunction()" class="btn-floating blue"><i class="icon-mode_edit large" id="editNotice"></i></button></li>
        </ul> -->
    </div>

   <!--  <script >
        function myFunction() {
  var person = prompt("Please enter your name", "Harry Potter");
  if (person != null) {
    document.getElementById("demo").innerHTML =
    "Hello " + person + "! How are you today?";
  } 
    </script> -->

    <!-- JavaScript files -->

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/data/reloj.js') }}"></script>
    <script src="{{ asset('js/initialize.js') }}"></script>
    <script src="{{ asset('js/owner.js') }}"></script>
    <script src="{{ asset('js/data/turn.js') }}"></script>
    <style>
        @media only screen and (max-width: 992px) {
    header,
    main,
    footer {
        padding-right: 0 !important;
    }

    // img.responsive-logo {
    //     max-height: 54px !important;
    // }
    .brand-logo {
            img {
                width: 150px;
                height:54px;
            }
        }
}
    </style>
    </body>
</html>