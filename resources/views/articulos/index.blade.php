@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col">Tipo</th>
                            <th scope="col">Artículo</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articulos as $articulo)
                            <tr>
                                <td>{{ $articulo->tipo }}</td>
                                <td>{{ $articulo->nombre }}</td>
                                <td>{{ $articulo->cantidad }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection