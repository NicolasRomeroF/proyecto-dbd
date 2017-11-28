@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                      <div class="panel panel-default">
                        <div class="panel-heading">Eventos</div>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Catastrofe</th>
      <th scope="col">Fecha de inicio</th>
      <th scope="col">Fecha de termino</th>
      <th scope="col">Comuna</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($beneficios as $beneficio)
    <tr>
      <td>{{ $beneficio->nombre }}</td>
      <td>{{ $beneficio->catastrofe->nombre }}</td>
      <td>{{ $beneficio->fecha_inicio }}</td>
      <td>{{ $beneficio->fecha_termino }}</td>
      <td>{{ $beneficio->comuna->nombre }}</td>
      <td><a class="btn btn-success" href="/medidas/eventobeneficio/{{$beneficio->id}}">Ver</a>
        @if(Auth::user()->authorizeRoles(['admin','organizacion',]))
      <a class="btn btn-primary" href="/medidas/eventobeneficio/{{ $beneficio->id }}/edit">Editar</a>
      <a class="btn btn-danger" href="/medidas/eventobeneficio/{{$beneficio->id}}/delete">Eliminar</a>
    @endif</td>
    </tr>
    @endforeach  
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection