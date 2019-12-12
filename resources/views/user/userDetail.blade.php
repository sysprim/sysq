@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid" style="margin-top:20px;">
            <div class="row">

                <div class="col s12 m8 offset-m2">

                    <ul id="tabs-swipe-demo" class="tabs">
                        <li class="tab col s12 m6"><a href="#user"  style="color:#0288d1">Usuarios</a></li>
                        <li class="tab col s12 m6"><a href="#password" style="color:#0288d1">Cambiar Contraseña</a></li>
                    </ul>

                <div class="card" id="user" style="margin:0;">
                    <div class="card-header">
                        <span class="card-title">Detalles</span> 
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data" aria-label="Configuración de mi cuenta">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                            
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
                                
                                <div class="row " style="padding:20px;">
                                    <div class="col s12 m8">
                                        <button type="submit" class="btn blue">
                                            Guardar
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                <div class="card" id="password" style="margin:0;">
                    <div class="card-header">
                        <span class="card-title">Cambiar Contraseña</span> 
                    </div>

                    <div class="card-body">
                        {{-- <form method="POST" action="{{ route('password.user')}}" enctype="multipart/form-data" aria-label="Configuración de mi cuenta"> --}}
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                                <div class="row">
                                    <div class="input-field col s12 m8 offset-m1" style="margin-top:20px;">

                                        <label for="mypassword" class="col-md-4 col-form-label text-md-right">Contraseña Actual</label>
                                        <input id="mypassword" type="password" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="mypassword">
                                    </div>
                                </div>

                                <div class="row">
                                        <div class="input-field col s12 m8 offset-m1">
                                            <label for="password" class="col m4 col-form-label text-md-right">Contraseña Nueva</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row">
                                        <div class="input-field col s12 m8 offset-m1">
                                            <label for="password-confirm" class="col m6 col-form-label text-md-right">Confirmar Contraseña</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

      
                                <div class="row " style="padding:10px;">
                                    <div class="col s12 m8">
                                        <button type="submit" class="btn blue">
                                            Guardar
                                        </button>

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