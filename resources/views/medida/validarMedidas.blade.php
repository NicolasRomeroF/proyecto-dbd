@extends('layouts.app')

@section('content')
<div class="container">
		    <div class="row">
		    		        <div class="col-md-8 col-md-offset-2">
		    		        	<div class="panel panel-default">
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nombre de catastrofe</th>
      <th scope="col">Nombre de medida</th>
      <th scope="col">Fecha Inicio</th>
      <th scope="col">Fecha Termino</th>
      <th scope="col">Tipo</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($medidas as $medida)
    <tr>
      <td>{{ $medida->catastrofe->nombre}}</td>
      <td>{{ $medida->nombre }}</td>
      <td>{{ $medida->fecha_inicio }}</td>
      <td>{{ $medida->fecha_termino }}</td>
      <td>{{ $medida->tipo }}</td>
      <td><a class="btn btn-success" href="/medidas/aceptarMedida/{{$medida->id}}">Aceptar</a>
      <a class="btn btn-danger" href="/medidas/rechazarMedida/{{$medida->id}}">Rechazar</a></td>
    </tr>
    @endforeach  
</tbody>
</table>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nombre de catastrofe</th>
      <th scope="col">Nombre de fondo</th>
      <th scope="col">Fecha Inicio</th>
      <th scope="col">Fecha Termino</th>
      <th scope="col">Monto actual</th>
      <th scope="col">Monto final</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
    @foreach($fondos as $fondo)
    <tr>
      <td>{{ $fondo->catastrofe->nombre }}</td>
      <td>{{ $fondo->nombre }}</td>
      <td>{{ $fondo->fecha_inicio }}</td>
      <td>{{ $fondo->fecha_termino }}</td>
      <td>{{ $fondo->montoActual }}</td>
      <td>{{ $fondo->monto }}</td>
      <td><a class="btn btn-success" href="/medidas/aceptarFondo/{{$fondo->id}}">Aceptar</a>
      <a class="btn btn-danger" href="/medidas/rechazarFondo/{{$fondo->id}}">Rechazar</a></td>
    </tr>
    @endforeach  
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection