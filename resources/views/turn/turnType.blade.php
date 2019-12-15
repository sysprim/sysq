@extends('layouts.simpleNav')

<body class="grey lighten-3 font-nunito">

@section('content')
    <main> 
        <div class="container-fluid">          
            <div class="row">                                     
                    <div class="col s12 center-align">
                        <h4>Seleccione el tipo de atención.</h4>
                    </div>
                 
                <div class="row">
                        <div class="col s12 m6 animated bounceIn">
                            <a href="{{route('save.turn', ['ci'=>$ci, 'id'=> $id, 'Normal'])}}" class="waves-effect btn-app white black-text">
                                <i class="icon-accessibility" style="font-size:60px;"></i>
                                <span style="font-size:30px;">Normal</span>
                            </a>
                        </div>
              
                        <div class="col s12 m6 animated bounceIn">
                            <a href="{{route('save.turn', ['ci'=>$ci, 'id'=> $id, 'Preferencial'])}}" class="waves-effect btn-app white black-text">
                                <i class="icon-accessible" style="font-size:60px;"></i>
                                <span style="font-size:30px;">Preferencial</span>
                            </a>

                            <div class="row" style="margin-top:10px;">
                                <div class="col s12 m12">
                                    <span>( Para usuarios: Discapacitados,
                                                           Embarazadas,
                                                           Tercera Edad )
                                    </span>
                                </div>
                            </div>
                        </div>
                </div>
            @include('includes.buttonFloating')
        </div>
    </div>
</main>
@endsection

</body>

</html>