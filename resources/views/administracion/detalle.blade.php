@extends('layouts.app') 
 
@section('content') 
<div class="container"> 
  <div class="row"> 
    <div class="col-md-8 col-md-offset-2"> 
      <div class="panel panel-default"> 
 
        <div class="panel-heading">Detalles del usuario</div> 
        <div class="panel-body"> 
          <div class="form-group"> 
            <label class="col-md-12 control-label">Nombre:</label> 
            <p class="col-sm-12 control-label">{{ $usuario->name }} {{ $usuario->apellido }}</p> 
          </div> 
          <div class="form-group"> 
            <label class="col-md-12 control-label">Estado:</label> 
            @if($usuario->activo) 
            <p class="col-sm-12 control-label">Activado</p> 
            @else 
            <p class="col-sm-12 control-label">Desactivado</p> 
            @endif 
          </div> 
          <div class="form-group"> 
            <label class="col-md-12 control-label">E-mail:</label> 
            <p class="col-sm-12 control-label">{{ $usuario->email }}</p><br> 
          </div> 
          <div class="form-group"> 
            <label class="col-md-12 control-label">Fecha de nacimiento:</label> 
            <p class="col-sm-12 control-label">{{ $usuario->fecha_nacimiento }}</p><br> 
          </div> 
          <div class="form-group"> 
            <label class="col-md-12 control-label">Rol:</label> 
            <p class="col-sm-12 control-label">{{ $usuario->roles()->first()->name }}</p><br> 
          </div> 
          @if(!is_null($usuario->id_organizacion)) 
          <div class="form-group"> 
            <label class="col-md-12 control-label">Id de organización:</label> 
            <p class="col-md-12 control-label">{{ $usuario->id_organizacion }}</p> 
          </div> 
          @endif 
          @if($usuario->roles()->first()->name != 'admin') 
          <form method="POST" action="{{ route('administracion.banear', $usuario->id) }}"> 
            <input name="id" type="hidden" value="{{ $usuario->id }}"> 
            {{ csrf_field() }} 
            @if($usuario->activo) 
            <button class="btn btn-outline-primary btn-sm">Deshabilitar</button> 
            @else 
            <button class="btn btn-outline-primary btn-sm">Habilitar</button> 
            @endif 
          </form> 
          @else 
          <h1><span class="label label-danger">No se pueden modificar los administradores</span></h1> 
          @endif 
        </div> 
      </div> 
    </div> 
  </div> 
</div> 
@endsection