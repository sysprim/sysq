@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m8 offset-m2" style="margin-top:2rem;">
            <form action="{{ route('password.email') }}" method="post" class="card">
                @csrf
                <div class="card-header center-align">
                    <h4>Recuperar Contraseña</h4>
                </div>
                <div class="card-content row">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="input-field col s12">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="email" type="email" class="validate" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        <label for="email">Correo Agregado</label>
                    </div>
                </div>
                <div class="card-footer center-align">
                    <button type="submit" class="btn green waves-effect waves-light">
                        Enviar
                        <i class="icon-send right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
