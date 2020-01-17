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
    <link rel="shortcut icon" href="{{ asset('img/sysQ-icono.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
</head>
<body class="grey lighten-3 font-OpenSans">
    <!-- Header -->
    @include('includes.preloader')    
    
    <header>
        
        <nav class="white container-fluid">
            <div class="nav-wrapper">
                    <a href="{{ route('index')  }}"  style="margin-top:0"><img class="logo" src="{{asset('img/sysQ-logo.png')}}" alt=""></a>
            
                <ul id="nav-mobile" class="right show-on-med-and-down">
                    <li>
                        <a href="{{ route('home') }}" class="black-text right tooltipped" data-position="left" data-tooltip="Entrar al Sistema"><i class="icon-account_circle"></i></a>
                    </li>
                </ul>   
            </div>
        </nav>
        
    </header>

    <main>
        <div class="container-fluid">
            <div class="row">
                @include('includes.messageInfo')
                <div class="col s12 center-align">
                    <h4>Por favor, ingrese su cedula de identidad</h4>
                </div>
            </div>
            <div ></div>
            <div class="row">
                <div class="col s12 m12 l6 offset-l3">
                    <form action="{{ route('save.client') }}" method="post" class="card grey lighten-5 hoverable">

                         @csrf

                        <div class="card-content row ">
                            <div class="input-field col s12">
                                <input type="text" pattern="[0-9]+" title="Solo puedes usar números" id="ci" minlength="5" maxlength="8" name="ci" style="height:80px; font-size:40px" required >
                          
                                @if ($errors->has('ci'))
                                    <p>{{ $errors->first('ci') }}</p>
                                @endif

                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" class="waves-effect btnNumber btn-app white black-text" value="1">
                                    <span class="font-OpenSans">1</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button autofocus type="button" class="waves-effect btnNumber btn-app white black-text" value="2">
                                    <span class="font-OpenSans">2</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" class="waves-effect btnNumber btn-app white black-text" value="3">
                                    <span class="font-OpenSans">3</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" class="waves-effect btnNumber btn-app white black-text" value="4">
                                    <span class="font-OpenSans">4</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" class="waves-effect btnNumber btn-app white black-text" value="5">
                                    <span class="font-OpenSans">5</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" class="waves-effect btnNumber btn-app white black-text" value="6">
                                    <span class="font-OpenSans">6</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" class="waves-effect btnNumber btn-app white black-text" value="7">
                                    <span class="font-OpenSans">7</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" class="waves-effect btnNumber btn-app white black-text" value="8">
                                    <span class="font-OpenSans">8</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" class="waves-effect btnNumber btn-app white black-text" value="9">
                                    <span class="font-OpenSans">9</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" id="borrar"  class="waves-effect btn-app red white-text">
                                    <i class="fas fa-backspace" style="font-size: 31px"></i>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="button" class="waves-effect btnNumber btn-app white black-text" value="0">
                                    <span class="font-OpenSans">0</span>
                                </button>
                            </div>
                            <div class="col s4 animated bounceIn">
                                <button type="reset" class="waves-effect btn-app red white-text">
                                    <i class="icon-close" style="font-size: 31px"></i>
                                </button>
                            </div>
                            <div class="col s12 animated bounceIn">
                                <button type="submit" class="waves-effect btn-app white-text" style="background-color:#34e064">
                                    <i class="fas fa-ticket-alt"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <style>
        
        button{
            border: none;
        }
    
    </style>


    <!-- JavaScript files -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js')  }}"></script>
    <script src="{{ asset('js/sweetalert.min.js')   }}"></script>
    <script src="{{ asset('js/aos.js')              }}"></script>
    <script src="{{ asset('js/owner.js')            }}"></script>
    <script src="{{ asset('js/home.js')             }}"></script>
    <script src="{{ asset('js/initialize.js')      }}"></script>
    <script src="{{ asset('js/data/cliente.js')      }}"></script>

</body>
</html>