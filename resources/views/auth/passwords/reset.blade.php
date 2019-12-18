@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m8 offset-m2"  style="margin-top:2rem;">
            <form action="{{ route('password.update') }}" method="post" class="card">
                <div class="card-header center-align"></div>
                <div class="card-content row">
                @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="input-field col m12">
                        <input id="email" type="email" class="validate" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        <label for="email">Correo Agregado</label>
                         @error('email')
                            <span class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate" name="password" required autocomplete="new-password">
                        <label for="password">Contraseña</label>
                        @error('password')
                            <span class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field col s12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <label for="password-confirm">Confirmar Contraseña</label>
                    </div>
                </div>
                <div class="card-footer center-align">
                    <button type="submit" class="btn green waves-effect waves-light">
                        <i class="icon-send right"></i>
                        Resetear Contraseña
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
