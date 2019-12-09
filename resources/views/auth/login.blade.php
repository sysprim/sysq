@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3" style="margin-top:20px;">
            <div class="card">
                <div class="card-header center-align" style="padding:10px;">
                   <span class="card-title ">Iniciar Sesión</span> 
                </div>

                <div class="card-body" style="margin-top:10px;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                            <div class="input-field col s12">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
                            </div>                         

                            <div class="input-field col s12">
                                <input id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s3 right offset-s5" style="margin-bottom:20px;">
                                <button type="submit" class="btn red">
                                    {{ __('Entrar') }}
                                </button>
                            </div>

                                <div class="left col s4 m4"">
                                    @if (Route::has('password.request'))
                                        <a style="margin-left:3px;" class="black-text" href="{{ route('password.request') }}">
                                            {{ __('Olvidaste tu contraseña?') }}
                                        </a>
                                     @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
