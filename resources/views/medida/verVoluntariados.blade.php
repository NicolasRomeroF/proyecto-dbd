@extends('layouts.app')

@section('content')
<div class="container">
		    <div class="row">
		    		        <div class="col-md-8 col-md-offset-2">
		    		        	<div class="panel panel-default">
                        <div class="panel-heading">Voluntariados</div>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Fecha de inicio</th>
      <th scope="col">Fecha de termino</th>
      <th scope="col">Comuna</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($voluntariados as $voluntariado)
    <tr>
      <td>{{ $voluntariado->nombre }}</td>
      <td>{{ $voluntariado->fecha_inicio }}</td>
      <td>{{ $voluntariado->fecha_termino }}</td>
      <td>{{ $voluntariado->comuna->nombre }}</td>
      <td><a href="/voluntariado/{{$voluntariado->id}}">Ver detalles</a></td>
    </tr>
    @endforeach  
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection