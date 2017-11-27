@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> {{ $beneficio->nombre }}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('medidas.update_evento') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="nombre" value="{{ $beneficio->nombre }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fecha" class="col-md-4 control-label">Fecha de inicio</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="fecha_inicio" value="{{ $beneficio->fecha_inicio }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fecha" class="col-md-4 control-label">Fecha de termino</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="fecha_termino" value="{{ $beneficio->fecha_termino }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Direccion</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ $beneficio->direccion }}" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Descripcion</label>
                            <div class="col-md-6">
                            <textarea name="descripcion" class="form-control" value="{{ $beneficio->descripcion }}" required>{{ $beneficio->descripcion }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                        <input name="beneficio" type="hidden" value="{{ $beneficio->id }}">
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
