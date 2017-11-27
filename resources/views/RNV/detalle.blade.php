@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">

        <div class="panel-heading">Detalles del voluntario</div>
        <div class="panel-body">
          <div class="form-group">
            <label class="col-md-12 control-label">Nombre:</label>
            <p class="col-sm-12 control-label">{{ $voluntario->nombre }} {{ $voluntario->apellido }}</p>
          </div>
          <div class="form-group">
            <label class="col-md-12 control-label">Disponibilidad:</label>
            @if($voluntario->disponible)
            <p class="col-sm-12 control-label">Libre</p>
            @else
            <p class="col-sm-12 control-label">Ocupado</p>
            @endif
          </div>
          <h3>Información de contacto</h3>
          <div class="form-group">
            <label class="col-md-12 control-label">E-mail:</label>
            <p class="col-sm-12 control-label">{{ $voluntario->email }}</p><br>
          </div>
          @if(!is_null($voluntario->numero_telefono))
          <div class="form-group">
            <label class="col-md-12 control-label">Teléfono:</label>
            <p class="col-md-12 control-label">{{ $voluntario->numero_telefono }}</p>
          </div>
          @endif
          @if(Auth::user()->authorizeRoles(['admin','gobierno',]))
            <form method="POST" action="{{ route('RNV.cambiar', $voluntario->id) }}">
              <input name="id" type="hidden" value="{{ $voluntario->id }}">
              {{ csrf_field() }}
              @if($voluntario->disponible)
              <button class="btn btn-outline-primary btn-sm">Marcar como ocupado</button>
              @else
              <button class="btn btn-outline-primary btn-sm">Marcar como disponible</button>
              @endif
            </form>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection