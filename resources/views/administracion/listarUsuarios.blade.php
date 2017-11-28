@extends('layouts.app')

@section('content')

<div class="container" border-width= "86px">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Estado de usuarios</div>
        <table class="table table-striped table-condensed">
          <thead>
            <tr>
              <th>Nombre Usuario</th>
              <th>E-Mail</th>
              <th>Rol</th>
              <th>Estado</th>
              <th>Detalle</th>                                     
            </tr>
          </thead>   
          <tbody>
            @foreach($usuarios as $usuario)
            <tr>
              <td>{{ $usuario->name }} {{ $usuario->apellido }}</td>
              <td>{{ $usuario->email }}</td>
              <td>{{ $usuario->roles()->first()->name }}</td>
              @if($usuario->activo)
                <td><span class="label label-success">Habilitado</span></td>
              @else
                <td><span class="label label-danger">Deshabilitado</span></td>   
              @endif
              <td><a href="/administracion/usuario/{{$usuario->id}}">Ver detalles</a></td>                                    
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
</div>

  @endsection