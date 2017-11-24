@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre del centro de acopio</th>
                            <th scope="col">Situación</th>
                            <th scope="col">Registro de artículos</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($centrosDeAcopio as $centroDeAcopio)
                            <tr>
                                <td>{{ $centroDeAcopio->id }}</td>
                                <td>{{ $centroDeAcopio->nombre }}</td>
                                <td>{{ $centroDeAcopio->situacion }}</td>
                                <td><a href="centrosdeacopio/{{$centroDeAcopio->id}}/articulos">Ver detalles</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection