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
      <th scope="col">Declarada por</th>
      <th scope="col">Fecha</th>
      <th scope="col">Tipo</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{ $catastrofe->nombre }}</td>
      <td>{{ $declarador }}</td>
      <td>{{ $catastrofe->fecha }}</td>
      <td>{{ $catastrofe->tipo }}</td>
      <td><a href="url">Generar medida</a></td>
    </tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection