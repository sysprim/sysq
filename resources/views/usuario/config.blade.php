@extends('layouts.app')

@section('content')

<body class="grey lighten-3 font-nunito">
    <main>
        <div class="container-fluid" style="margin-top:20px;">
            
            <div class="row">
                <div class="col s12">
                            <ul class="tabs">
                                <li class="tab col s12 m6"><a href="#usuario" style="color:blue">Usuarios</a></li>
                                <li class="tab col s12 m6"><a href="#test2" style="color:blue">Taquillas</a></li>
                            </ul>                
                    

                    <div class="collection with-header">
                        <div class="collection-header" id="usuario"><h5>Usuarios Registrados</h5></div>
                        
                        <table class="white centered highlight responsive-table" id="Material">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Detalles</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
        
                                 @if(empty($users))
                                <tbody>
                                    <tr>
                                        <td colspan="5"><p>No hay datos registrados</p></td>
                                    </tr>
                                </tbody>

                                @else @foreach ($users as $user)
                                
                                <tbody> 
                                          <input type="hidden" value="{{$user->id}}"  id="user" >
                                   <tr>
                                        <td>{{ $user->name }} </td>
                                        <td>{{ $user->email }}</td>

                                        <td>
                                            
                                            <a href="{{ route('detalle', ['id' => $user->id]) }}" class="btn btn-small btn-floating blue waves-effect effect-light"><i class="icon-pageview"></i></a>
                                        </td>
                                        <td>
                                             <a href="#" id="delete" class="btn btn-small btn-floating red waves-effect effect-light"><i class="icon-delete"></i></a>
                                           <!--  <a href="{{ route('eliminar', ['id' => $user->id]) }}" class="btn btn-small btn-floating red waves-effect effect-light"><i class="icon-delete"></i></a> -->
                                        </td>
                                    </tr> 
                                     
                                     @endforeach 
                                     @endif  
                                </tbody>
                            </table>                                   
                    </div>                   
                </div>
            </div>
        </div>
    </main>

   <!--  <style>
        .tabs .tab a:focus, .tabs .tab a:focus.active{
            background: #039be5;
            opacity: 0.7;
            color: #fff;
            border: none;
        }
    </style> -->
 @endsection