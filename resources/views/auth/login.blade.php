@extends('layouts.app')

@section('content') 
<div class="container-fluid">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3" style="margin-top:2rem;">
            <form  method="POST" action="{{ route('login') }}" class="card">
                <div class="card-header center-align">
                   <h4 class="">Iniciar Sesión</h4> 
                </div>
                <div class="card-content row">
                    @csrf
                    <div class="input-field col s12 m12">
                        <i class="icon-markunread prefix"></i>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="email" class="col-form-label text-md-right">{{ __('Correo') }}</label>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>                         
                    <div class="input-field col s12 m12">
                        <i class="icon-lock_outline prefix"></i>
                        <input id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <label for="password" class="col-form-label text-md-right">{{ __('Contraseña') }}</label>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif  
                    </div>
                </div>
                <div class="card-footer center-align">
                    <button type="submit" class="btn white-text waves-effect waves-light" style="background-color:#1860ab">
                        <i class="icon-send right"></i>
                        {{ __('Entrar') }}
                    </button>
                </div>
                <div class="card-footer center-align">
                    @if (Route::has('password.request'))
                        <a class="blue-text" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                     @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
