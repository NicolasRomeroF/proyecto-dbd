@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col">Nombre del centro de acopio</th>
                                  <th scope="col">Fecha de inicio</th>
      <th scope="col">Fecha de termino</th>
      <th scope="col">Situacion</th>
                            <th scope="col">Registro de artículos</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($centrosDeAcopio as $centroDeAcopio)
                            <tr>
                                <td>{{ $centroDeAcopio->nombre }}</td>
                                <td>{{ $centroDeAcopio->fecha_inicio }}</td>
                                <td>{{ $centroDeAcopio->fecha_termino }}</td>
                                <td>{{ $centroDeAcopio->situacion }}</td>
                                <td><a href="centrosdeacopio/{{$centroDeAcopio->id}}">Ver detalles</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection