@extends('layouts.app')

@section('content')
<div class="container">
		    <div class="row">
		    		        <div class="col-md-8 col-md-offset-2">
		    		        	<div class="panel panel-default">
                        <div class="panel-heading">RNV: Voluntarios disponibles</div>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Detalles</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($voluntarios as $voluntario)
    <tr>
      <td>{{ $voluntario->nombre }}</td>
      <td>{{ $voluntario->apellido }}</td>
      <td><a href="/RNV/voluntario/{{$voluntario->id}}">Ver detalles</a></td>
    </tr>
    @endforeach  
  </tbody>
</table>
</div>
</div>
</div>
</div>
@endsection