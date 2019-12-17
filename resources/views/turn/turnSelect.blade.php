@extends('layouts.simpleNav')

<body class="grey lighten-3 font-nunito">

@section('content')
    <main> 
        <div class="container-fluid">     
            <div class="row">                         
                <div class="row">
                    @include('includes.messageInfo')
                    <div class="col s12 center-align">      
                        <h4>Seleccione la taquilla para la atención.</h4>
                    </div>
                </div>
            
                <div class="row">
                    @foreach($tickets as $ticket)
                        <div class="col s12 m6 animated bounceIn">
                            <a href="{{route('ticket.turn',['ci'=>$ci, 'id'=>$ticket->id])}}" class="waves-effect btn-app white black-text">
                                <i class="icon-subtitles black-text" style="font-size:60px;"></i>
                                <span style="font-size:30px;">{{$ticket->name_ticket}}</span>
                            </a>

                            <div class="row" style="margin-top:10px;">
                                <div class="col s12 m12">
                                    <span>
                                        {{"( ".$ticket->description_ticket. " )"}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>   
            </div>
        @include('includes.buttonFloating')
        </div>
    </main>
@endsection

</body>

</html>