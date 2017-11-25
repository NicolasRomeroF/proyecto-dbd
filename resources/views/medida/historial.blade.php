@extends('layouts.app')

@section('content')
<div class="container">
		    <div class="row">
		    		        <div class="col-md-8 col-md-offset-2">
		    		        	<div class="panel panel-default">
<table class="table table-sm">
  <thead>
    <tr>
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
      <td>{{ $medida->nombre }}</td>
      <td>{{ $medida->fecha_inicio }}</td>
      <td>{{ $medida->fecha_termino }}</td>
      <td>{{ $medida->tipo }}</td>
      <td><a href="url">Ver detalles</a></td>
    </tr>
    @endforeach  
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection