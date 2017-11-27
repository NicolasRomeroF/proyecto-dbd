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
      <th scope="col">Catastrofe</th>
      <th scope="col">Fecha de inicio</th>
      <th scope="col">Fecha de termino</th>
      <th scope="col">Comuna</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($voluntariados as $voluntariado)
    <tr>
      <td>{{ $voluntariado->nombre }}</td>
      <td>{{ $voluntariado->catastrofe->name }}</td>

      <td>{{ $voluntariado->fecha_inicio }}</td>
      <td>{{ $voluntariado->fecha_termino }}</td>
      <td>{{ $voluntariado->comuna->nombre }}</td>
      <td><a class="btn btn-success" href="/medidas/voluntariado/{{$voluntariado->id}}">Ver</a>
      <a class="btn btn-primary" href="/medidas/voluntariado/{{ $voluntariado->id }}/edit">Editar</a>
      <a class="btn btn-danger" href="/medidas/voluntariado/{{$voluntariado->id}}/delete">Eliminar</a></td>
    </tr>
    @endforeach  
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection