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
</head>
<body class="grey lighten-3 font-nunito">
    <!-- Header -->
    <header>
        <nav class="white container-fluid">
            <div class="nav-wrapper">
                <a href="{{ route('home') }}" class="black-text tooltipped" data-position="bottom" data-tooltip="Entrar al Sistema"><i class="small icon-account_circle"  style="display:inline-block"></i></a>
                <a href="{{ route('index') }}" class="brand-logo font-audiowide right deep-purple-text text-darken-2 tooltipped" data-position="bottom" data-tooltip="Inicio" >SysQ</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col s12 center-align">
                    <h4>Ingrese su cedula de identidad</h4>
                </div>
            </div>
            <div ></div>
            <div class="row">
                <div class="col s12 m8 offset-m2 l6 offset-l3">
                    <form action="" method="post" class="card grey lighten-5 hoverable">
                        <div class="card-content row ">
                            <div class="input-field col s12">
                                <input type="number" id="resultado" min="1" name="" id="ci" style="height:80px; font-size:40px">
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" id="n1" class="btn-app white black-text" value='1'>
                                    <span>1</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" id="n2" class="btn-app white black-text">
                                    <span>2</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" id="n3" class="btn-app white black-text">
                                    <span>3</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" id="n4" class="btn-app white black-text">
                                    <span>4</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" id="n5" class="btn-app white black-text">
                                    <span>5</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" id="n6" class="btn-app white black-text">
                                    <span>6</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" id="n7" class="btn-app white black-text">
                                    <span>7</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" id="n8" class="btn-app white black-text">
                                    <span>8</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" id="n9" class="btn-app white black-text">
                                    <span>9</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button"  class="btn-app red white-text">
                                    <i class="fas fa-backspace"></i>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" id="n0" class="btn-app white black-text">
                                    <span>0</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="reset" class="btn-app red white-text">
                                    <i class="icon-close"></i>
                                </button>
                            </div>
                            <div class="col s12 animated bounceIn">
                                <button type="button" class="btn-app green white-text">
                                    <i class="fas fa-ticket-alt"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


    <!-- JavaScript files -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js')  }}"></script>
    <script src="{{ asset('js/sweetalert.min.js')   }}"></script>
    <script src="{{ asset('js/aos.js')              }}"></script>
    <script src="{{ asset('js/owner.js')            }}"></script>
    <script src="{{ asset('js/home.js')             }}"></script>
    <script src="{{ asset('js/inicializar.js')             }}"></script>

</body>
</html>