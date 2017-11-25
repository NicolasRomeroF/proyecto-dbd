@extends('layouts.app')

@section('content')
<div class="container">
		    <div class="row">
		    		        <div class="col-md-8 col-md-offset-2">
		    		        	<div class="panel panel-default">
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nombre del centro</th>
      <th scope="col">Fecha de inicio</th>
      <th scope="col">Fecha de termino</th>
      <th scope="col">Situacion</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($centros as $centro)
    <tr>
      <td>{{ $centro->nombre }}</td>
      <td>{{ $centro->fecha_inicio }}</td>
      <td>{{ $centro->fecha_termino }}</td>
      <td>{{ $centro->situacion }}</td>
      <td><a href="/catastrofes/{{$centro->id}}">Ver detalles</a></td>
    </tr>
    @endforeach  
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection