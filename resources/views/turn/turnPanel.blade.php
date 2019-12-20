
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
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
</head>
<body>
    @include('includes.preloader')

    <div class="row">
        <div class="col s9 m9 l9">
            <main>
                <div class="row">
                    <div class="col s12 m12 l12">           
                        <video width="100%" height="auto" src="{{asset('img/big_buck_bunny.mp4')}}" frameborder="0" allowfullscreen loop autoplay></video>                
                    </div>
                </div>
            </main>

        <div class="row">
            <div class="col s12 m12 l12" >   
                <footer class="page-footer blue">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col s12">
                               <marquee behavior="" direction=""><b>Cintillo de Noticia:</b><p id="notice"></p></marquee>
                            </div>
                        </div>
                        <div class="row" style="display:none" id="editNoticePanel">
                            <div class="input-field col s12">
                               <input type="text" id="noticeCam" name="noticeCam" class="white-text">
                               <label for="noticeCam" class="white-text">Cambiar Noticias</label>
                               <button type="button" class="btn white black-text" id="camNotice">Cambiar</button>
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
                </div>
            </div>
        </div>
    </div>

    <style>
    
    .row{
        margin: 0;
    }

    .row .col{
        padding: 0;
    }
    
    </style>

    <!-- JavaScript files -->

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/materialize.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/data/reloj.js') }}"></script>
<script src="{{ asset('js/initialize.js') }}"></script>
<script src="{{ asset('js/owner.js') }}"></script>
<script src="{{ asset('js/data/turn.js') }}"></script>
    
</body>
</html>




