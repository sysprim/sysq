
@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid" style="margin-top:20px;">
            <div class="row right-align">
                <div class="col s3 m2 center-align">
                    <i class="fas fa-bullhorn" style="font-size: 50px; margin-top: 1rem;"></i>
                </div>
                <div class="col s9 m10">
                    <span style="font-size: 40px; font-weight: bolder;">Atención</span><br>
                    <span>Realizar la llamada por ticket de cliente para cada servicio.</span>
                </div>
            </div>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m3 blue center-align" style="border: solid 1px #cccccc">
                    <h6 class="white-text">Taquilla</h6>
                    <span class="white-text" style="font-size: 70px;">1</span><br>
                    <button class="btn btn-flat white-text">Cambiar</button>
                </div>
                <div class="col s12 m9">

                    <div class="row">
                        <div class="col s12" style="margin-bottom:40px;margin-top:25px;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Ticket</td>
                                        <td>A001</td>
                                    </tr>
                                    <tr>
                                        <td>Servicio</td>
                                        <td>ATENCIÓN AL CLIENTE</td>
                                    </tr>
                                    <tr>
                                        <td>Documento</td>
                                        <td>V28286639</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col s12 m4 animated bounceIn">
                            <a href="" class="btn-app white black-text">
                                <i class="fas fa-bullhorn"></i>
                                <span style="font-size: 16px;">Llamar de Nuevo</span>
                            </a>
                        </div>
                        <div class="col s12 m4 animated bounceIn">
                            <a href="" class="btn-app white black-text">
                                <i class="fas fa-play"></i>
                                <span style="font-size: 16px;">Iniciar Atención</span>
                            </a>
                        </div>
                        <div class="col s12 m4 animated bounceIn">
                            <a href="" class="btn-app white black-text">
                                <i class="fas fa-user-times"></i>
                                <span style="font-size: 16px;">No se presentó</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal va en una seccion aparte, solo que aqui esta la prueba -->
            <div id="modal1" class="modal">
                <div class="modal-content blue-text center-align">
                    <div class="row">
                        <div class="col s12 center-align">
                            <span style="font-size:50px;">Ticket</span>
                        </div>
                        <div class="col s12 center-align">
                            <span style="font-size: 80px; font-weight: 900">A002</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer blue white-text row">
<div class="col s12 center-align blue">
                        <span style="font-size:50px;">TAQUILLA 3</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="collection with-header">
                        <div class="collection-header"><h5>Mi Fila (Todos)</h5></div>

                        <a href="#modal1" class="collection-item avatar modal-trigger">
                            <i class="circle blue fas fa-user"></i>
                            <span class="title">A002</span><br>
                            <span class="title">282886639</span>
                        </a>
                        <a href="" class="collection-item avatar">
                            <i class="circle blue fas fa-user"></i>
                            <span class="title">A002</span><br>
                            <span class="title">282886639</span>
                        </a>
                        <a href="" class="collection-item avatar">
                            <i class="circle blue fas fa-user"></i>
                            <span class="title">A002</span><br>
                            <span class="title">282886639</span>
                        </a>
                        <a href="" class="collection-item avatar">
                            <i class="circle blue fas fa-user"></i>
                            <span class="title">A002</span><br>
                            <span class="title">282886639</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
