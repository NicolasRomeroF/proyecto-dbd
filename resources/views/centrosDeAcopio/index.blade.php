@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Nombre del centro de acopio</th>
                            <th scope="col">Fecha de inicio</th>
                            <th scope="col">Fecha de termino</th>
                            <th scope="col">Situacion</th>
                            <th scope="col">Comuna</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($centrosDeAcopio as $centroDeAcopio)
                        <tr>
                            <td>{{ $centroDeAcopio->nombre }}</td>
                            <td>{{ $centroDeAcopio->fecha_inicio }}</td>
                            <td>{{ $centroDeAcopio->fecha_termino }}</td>
                            <td>{{ $centroDeAcopio->situacion }}</td>
                            <td>{{ $centroDeAcopio->comuna->nombre }}</td>

                            <td>
                            <a class="btn btn-success " href="centrosdeacopio/{{$centroDeAcopio->id}}">Ver</a>
                            <a class="btn btn-primary" href="/medidas/centrosdeacopio/{{ $centroDeAcopio->id }}/edit">Editar</a>
                            <a class="btn btn-danger" href="/medidas/centrosdeacopio/{{$centroDeAcopio->id}}/delete">Eliminar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection