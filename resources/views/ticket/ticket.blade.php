@extends('layouts.app')
           
@section('content')

<script>
    // const url = "http://localhost/sysq/public/";
    const url = "http://144.91.97.209/";
        
    function redireccionar(){
        setTimeout("location.href='http://localhost/sysq/public/'", 10000);
    }

</script>

<main >
    <body onload="redireccionar()">
        <div class="container-fluid" style="padding: 20px">
            <div class="row" style="margin-top:20px;">
                <div class="col s12 m12 l12">
                   <div class="alert alert-info" role="alert">
                       Recuerde el número, la pagina sera actualizada en breve
                    </div>
                </div>
            </div> 
            
            <div class="row">
                <div class="col s12 m8 offset-m2 l6 offset-l3">
                    <div class="card z-depth-2">
                        <div class="card-header center-align" style="background-color:#1860ab">
                            <h4 class="font-audiowide white-text">SysQ</h4>
                            <span class="white-text">{{ $turn->created_at }}</span>
                        </div>
                        <div class="card-content center-align">
                            <h4>{{ $turn->clients->ci_client }}</h4>
                            <span class="ticket-number">{{$turn->random_code}}</span>
                            <h4>{{$turn->tickets->name_ticket}}</h4>
                            <span>({{$turn->turn_type}})</span>
                        </div>
                        <div class="card-footer center-align" style="background-color:#1860ab">
                            <span class="white-text">Sistema para Colas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.buttonFloating')
    
        <style>
            .ticket-number {
                font-size: 96px;
                font-weight: 900;
            }
        </style>
        
    </body>

</main>
    
@endsection
    