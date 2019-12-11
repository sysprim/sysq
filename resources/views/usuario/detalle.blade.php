@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid" style="margin-top:20px;">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                <div class="card">

                    <div class="card-header">
                        <span class="card-title">Detalles</span> 
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{-- route('update')--}}" enctype="multipart/form-data" aria-label="Configuración de mi cuenta">
                            @csrf
                            
                            <input type="hidden ">
                            <div class="row" style="margin-top:20px;" >
                                <div class="form-group col s8 offset-s1">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                    <input id="name" type="text" {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>
    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
    
                                <div class="col s8 offset-s1">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Agregado') }}</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                                
                                <div class="row">
                                    <div class="col s8 offset-s1">

                                        <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                                        <input id="password" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="password" value="{{ $user->password }}" disabled>
                                    </div>
                                </div>

      
                                <div class="row " style="padding:20px;">
                                    <div class="col s12 m8">
                                        <button type="submit" class="btn blue">
                                            Guardar
                                        </button>

                                         <a href="#" id="delete" class="btn btn-small btn-floating red waves-effect effect-light"><i class="icon-delete"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
</body>
</html>