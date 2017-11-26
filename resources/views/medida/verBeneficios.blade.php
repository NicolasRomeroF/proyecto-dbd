@extends('layouts.app')

@section('content')
<div class="container">
		    <div class="row">
		    		        <div class="col-md-8 col-md-offset-2">
		    		        	<div class="panel panel-default">
                        <div class="panel-heading">Eventos a beneficio</div>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nombre del evento</th>
      <th scope="col">Fecha de inicio</th>
      <th scope="col">Fecha de termino</th>
      <th scope="col">Comuna</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($beneficios as $beneficio)
    <tr>
      <td>{{ $beneficio->nombre }}</td>
      <td>{{ $beneficio->fecha_inicio }}</td>
      <td>{{ $beneficio->fecha_termino }}</td>
      <td>{{ $beneficio->comuna()->get() }}</td>
      <td><a href="/eventobeneficio/{{$benificio->id}}">Ver detalles</a></td>
    </tr>
    @endforeach  
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection