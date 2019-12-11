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
                <div class="col s6">
                    
                </div>
                <div class="col s6">
                    
                </div>
            </div>

            <div class="row">
                <div class="col s6 center-align pink bordered">
                    <h4>Turno</h4>
                </div>
                <div class="col s6 center-align pink bordered">
                    <h4>Taquilla</h4>
                </div>
                <div class="col s6 center-align orange bordered">
                    <h4>A001</h4>
                </div>
                <div class="col s6 center-align orange bordered">
                    <h4>1</h4>
                </div>
                <div class="col s6 center-align orange bordered">
                    <h4>S001</h4>
                </div>
                <div class="col s6 center-align orange bordered">
                    <h4>2</h4>
                </div>
            </div>

        </div>
        <!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="icon-close"></i></a> -->
    </header>

    <main>
        <div class="container-fluid">
            
        </div>
    </main>

    <footer class="page-footer white black-text">
        <div class="container-fluid">
            <div class="row">
                <div class="col s12">
                    Cintillo de Noticia
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <span class="time">10:20</span><span>AM</span>
                </div>
                <div class="col s6">
                    <p class="date-year truncate">12/12/2019</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript files -->

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
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