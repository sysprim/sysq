@extends('layouts.app')

@section('content')

<script src="{{ asset('js/data/ticket.js') }}"></script>

<div class="row" style="margin-top:10px;">
        <div class="col s12 m12 ">
                <div class="breadcrumb-nav col s12">
                    <a href="{{ route('panel') }}" class="breadcrumb black-text">Panel</a>
                    <a href="{{ route('config') }}" class="breadcrumb black-text">Configuración</a>
                </div>
        </div>
    </div>

<div class="container">   
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="margin-top:20px;">
                <div class="card-header">
                    <span class="card-title">Actualizar</span>
                    <button type="button" id="delete" data-position="bottom" data-tooltip="Eliminar" class="tooltipped btn btn-small btn-floating red waves-effect effect-light right" title="Eliminar"><i class="icon-delete"></i></button>
                </div>

                <div class="card-body">
                    <form method="POST" action=" {{ route('update.ticket') }}">
                        @csrf
                    <input type="hidden" name="id" id="id" value="{{ $ticket->id }}">

                    <div class="row" style="margin-top:20px;">                         
                            <div class="input-field col m8">
                                <i class="icon-looks_one prefix"></i> 
                                <label for="number_ticket" class="col-form-label text-md-right">Número de Taquilla</label>
                                <input id="number_ticket" type="number" class="form-control @error('number_ticket') is-invalid @enderror" name="number_ticket" value="{{ $ticket->number_ticket }}" required autocomplete="number_ticket" autofocus>

                                @error('number_ticket')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row" style="margin-top:20px;">                         
                            <div class="input-field col m8">
                                <i class="icon-looks_one prefix"></i> 
                                <label for="name_ticket" class="col-form-label text-md-right">Nombre Taquilla</label>
                                <input id="name_ticket" type="text" class="form-control @error('name_ticket') is-invalid @enderror" name="name_ticket" value="{{ $ticket->name_ticket }}" required autocomplete="name_ticket" autofocus>

                                @error('name_ticket')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">                        
                            <div class=" input-field col m8">
                                <i class="icon-picture_in_picture prefix"></i>  
                                <label for="description_ticket" class="col-form-label text-md-right">Descripción</label>
                                <input id="description_ticket" type="text" class="form-control @error('description_ticket') is-invalid @enderror" name="description_ticket" value="{{ $ticket->description_ticket }}" autocomplete="description_ticket">

                                @error('description_ticket')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col s1" style="padding:10px;">
                                <button type="submit"  class="btn blue">
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
@endsection