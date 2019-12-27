@extends('layouts.app')
@section('content') 
<div class="container-fluid">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3" style="margin-top:2rem;">
            @include('includes.message')
            <form  method="POST" action="{{route('save.video')}}" class="card" enctype="multipart/form-data">
                <div class="card-header center-align">
                   <h4 class="">Subir Video</h4> 
                </div>
                <div class="card-content row">
                    @csrf

                    <div class="file-field input-field col s12 m12">
                        <div class="btn" style="background-color:#34e064">
                          <span>Archivo</span>
                          <i class="icon-archive"></i>
                          <input type="file" id="video_path"  name="video_path" class="form-control {{  $errors->has('video_path') ? 'is-invalid': '' }}" required>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">  
                        </div>

                        @if ($errors->has('video_path'))
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('video_path') }}</strong>
                                </span>
                            @endif
                      </div>

                    <div class="input-field col s12 m12">
                        <i class="icon-assignment prefix"></i>
                        <textarea id="description"  name="description" class="materialize-textarea {{  $errors->has('description') ? 'is-invalid': '' }}"></textarea>
                        <label for="description" class="">Descripción</label>

                        @if($errors->has('description'))
                            <span class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                            </span>                     
                        @endif
                    </div>
                </div>
                <div class="card-footer center-align">
                    <button type="submit" class="btn white-text waves-effect waves-light" style="background-color:#1860ab">
                        <i class="icon-send right"></i>
                        {{ __('Subir Video') }}
                    </button>
                </div>
            </form>
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
</div>
@endsection
