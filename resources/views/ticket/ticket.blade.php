<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.simpleNav')
        <style>
        .ticket-number {
            font-size: 96px;
            font-weight: 900;
        }
    </style>
</head>
<body class="grey lighten-3 font-nunito">
    <!-- Header -->
    <!-- <header>
        <nav class="white container-fluid">
            <div class="nav-wrapper">
                <a href="" class="brand-logo font-audiowide right deep-purple-text text-darken-2">SysQ</a>
            </div>
        </nav>
    </header> -->

    <main>
        <div class="container-fluid" style="margin-top: 20px">
            <div class="row">
                <div class="col s12 m8 offset-m2 l6 offset-l3">
                    <div class="card z-depth-2">
                        <div class="card-header center-align blue darken-2">
                            <h4 class="font-audiowide white-text">SysQ</h4>
                            <span class="white-text">{{ $turn->created_at }}</span>
                        </div>
                        <div class="card-content center-align">
                            <h4>{{ $turn->clients->ci_client }}</h4>
                            <span class="ticket-number">{{$turn->random_code}}</span>
                            <h4>{{$turn->tickets->name_ticket}}</h4>
                            <span>({{$turn->turn_type}})</span>
                        </div>
                        <div class="card-footer center-align blue darken-2">
                            <span class="white-text">Sistema para Colas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.buttonFloating')
    </main>


    <!-- JavaScript files -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/owner.js') }}"></script>
</body>
</html>