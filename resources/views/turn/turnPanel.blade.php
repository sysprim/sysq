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

            <div class="row">
                <div class="col s6 center-align blue">
                    <h4>Turno</h4>
                </div>
                <div class="col s6 center-align blue">
                    <h4>Taquilla</h4>
                </div>
                <div class="col s6 center-align grey lighten-2">
                    <h4>A001</h4>
                </div>
                <div class="col s6 center-align grey lighten-2">
                    <h4>1</h4>
                </div>
                <div class="col s6 center-align grey lighten-2">
                    <h4>S001</h4>
                </div>
                <div class="col s6 center-align grey lighten-2">
                    <h4>2</h4>
                </div>
            </div>

        </div>
        <!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="icon-close"></i></a> -->
    </header>

    <main>
        <div class="row"style="margin:0;">
            <div class="video-container">
                <iframe width="853" height="480" src="chale" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </main>

    <footer class="page-footer blue black-text">
        <div class="container-fluid">
            <div class="row">
                <div class="col s12">
                    Cintillo de Noticia
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="date">
                        <span><i class="icon-date_range     "></i></span>
                        <span id="weekDay"  class="weekDay  "></span><span>,</span> 
                        <span id="day"      class="day      "></span> <span>de</span>
                        <span id="month"    class="month    "></span><span > del</span>
                        <span id="year"     class="year     "></span>
                    </div>               
                </div>

                <div class="col s6">
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

    <!-- JavaScript files -->

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/data/turn.js') }}"></script>
    <script src="{{ asset('js/owner.js') }}"></script>

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

</html>