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
                <div class="col s12 m6 animated bounceIn">
                    <a href="" class="btn-app white black-text">
                        <i class="fas fa-address-card"></i>
                        <span style="font-size:30px;">CAJA GENERAL</span>
                    </a>
                </div>
                <div class="col s12 m6 animated bounceIn">
                    <a href="" class="btn-app white black-text">
                        <i class="fas fa-user-check"></i>
                        <span style="font-size:30px;">ATENCIÓN AL CLIENTE</span>
                    </a>
                </div>
                <div class="col s12 m6 animated bounceIn">
                    <a href="" class="btn-app white black-text">
                        <i class="fas fa-credit-card"></i>
                        <span style="font-size:30px;">CRÉDITOS</span>
                    </a>
                </div>
                <div class="col s12 m6 animated bounceIn">
                    <a href="" class="btn-app white black-text">
                        <i class="icon-work"></i>
                        <span style="font-size:30px;">GERENTE</span>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection

</body>

</html>