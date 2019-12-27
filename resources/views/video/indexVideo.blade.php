@extends('layouts.app')

@section('content') 

<div class="container-fluid">
    <div class="row" style="margin-bottom:100px;">
        <div class="col s12 m12 l12">
            @include('includes.message')
            <div class="row card white" style="margin-top:100px;">
                <div class="col s12 centered"> 
                    <h4>
                        <i class="icon-video_label" style="color:#1860ab"></i>
                        Videos Subidos
                    </h4> 
                </div>
                <div class="divider"></div>
                    <table class="striped centered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Video</th>
                                <th>Descripción</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                    @if($video)
                        @foreach ($video as $videos)
                            <tr>
                                <td>{{ $videos->video_path }} </td>
                                <td>{{ $videos->description_video }}</td>                                     
                                <td>                                          
                                    <a href="#" onclick="deleteVideo({{$videos->id}})" class="btn btn-small btn-floating waves-effect effect-light red"><i class="icon-close"></i></a>
                                </td>
                            </tr> 
                            @endforeach
                    @else
                        <tr>
                           <span>No hay registros</span>
                        </td>
                    </tr>
        
                    @endif
                        </tbody>
                    </table>
                
            </div>
        </div>
    </div>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large " style="background-color:#34e064">
          <i class="large icon-attach_file"></i>
        </a>
        <ul>
            <li><a href="{{route('register.video')}}" class="btn-floating tooltipped yellow" data-position="left" data-tooltip="Subir Videos"><i class="icon-publish"></i></a></li>
            <li><a href="{{route('index.video')}}" class="btn-floating tooltipped orange" data-position="left" data-tooltip="Ver Videos"><i class="icon-ondemand_video"></i></a></li>      
        </ul>
    </div>
    <script src="{{ asset('js/data/video.js') }}"></script>
</div>
@endsection