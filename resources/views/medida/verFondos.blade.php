@extends('layouts.app')

@section('content')
<div class="container">
		    <div class="row">
		    		        <div class="col-md-10 col-md-offset-2">
		    		        	<div class="panel panel-default">
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nombre del fondo</th>
      <th scope="col">Estado</th>
      <th scope="col">Fecha de inicio</th>
      <th scope="col">Fecha de termino</th>
      <th scope="col">Monto actual</th>
      <th scope="col">Monto</th>
      <th scope="col">Banco</th>
      <th scope="col">Cuenta</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($fondos as $fondo)
    <tr>
      <td>{{ $fondo->nombre }}</td>
      @if($fondo->activo)
        <td>Activo</td>
      @else
        <td>Meta lograda</td>
      @endif
      <td>{{ $fondo->fecha_inicio }}</td>
      <td>{{ $fondo->fecha_termino }}</td>
      <td>{{ $fondo->montoActual }}</td>
      <td>{{ $fondo->monto }}</td>
      <td>{{ $fondo->banco }}</td>
      <td>{{ $fondo->cuenta }}</td>
      <td><a class="btn btn-success" href="/medidas/eventobeneficio/{{$fondo->id}}">Ver</a>
      <a class="btn btn-primary" href="/medidas/eventobeneficio/{{ $fondo->id }}/edit">Editar</a>
      <a class="btn btn-danger" href="/medidas/eventobeneficio/{{$fondo->id}}/delete">Eliminar</a></td>
      <a class="btn btn-info" href="/catastrofes/medidas/generatedonacion/{{$fondo->id}}">Donar</a>
    </tr>
    @endforeach  
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection