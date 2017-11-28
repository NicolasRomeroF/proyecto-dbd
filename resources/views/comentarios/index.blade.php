@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Comentario</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comentarios as $comentario)
                            <tr>
                                <td>{{ $comentario->id }}</td>
                                @foreach($users as $user)
                                <td>{{ $user->name }}</td>
                                @endforeach
                                <td>{{ $comentario->comentario }}</td>
                            </tr>
                        @endforeach


                        @foreach($medidas as $medida)

                            @if($medida->tipo == 'beneficio')


                                <a href= /medidas/eventobeneficio/{{$id_medida}}/comentarios/comentar>
                                    <button class="btn" type="button" >Escribir comentario</button
                                    ></a>

                            @elseif ($medida->tipo == 'centro')

                                <a href= /medidas/centrosdeacopio/{{$id_medida}}/comentarios/comentar>
                                    <button class="btn" type="button" >Escribir comentario</button
                                    ></a>

                            @elseif ($medida->tipo == 'voluntariado')

                                <a href= /medidas/voluntariado/{{$id_medida}}/comentarios/comentar>
                                    <button class="btn" type="button" >Escribir comentario</button
                                    ></a>

                            @endif
                        @endforeach




                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection