@extends('layouts.simpleNav')

<body class="grey lighten-3 font-nunito">

@section('content')
    <main> 
        <div class="container-fluid">
            <div class="row">
                <div class="col s12 center-align">
                    <h4>Seleccione la taquilla para la atención.</h4>
                </div>
            </div>

            
                <div class="row">
                    @foreach($tickets as $ticket)
                        <div class="col s12 m6 animated bounceIn">
                            <a href="" class="btn-app white black-text">
                                <i class="fas fa-address-card"></i>
                                <span style="font-size:30px;">{{$ticket->name_ticket}}</span>
                            </a>
                        </div>
                    @endforeach
                </div>   
        </div>
    </main>
@endsection

</body>

</html>