@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> {{ $fondo->nombre }}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('fondos.update') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="nombre" value="{{ $fondo->nombre }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fecha" class="col-md-4 control-label">Fecha de inicio</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="fecha_inicio" value="{{ $fondo->fecha_inicio }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fecha" class="col-md-4 control-label">Fecha de termino</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="fecha_termino" value="{{ $fondo->fecha_termino }}" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Monto máximo</label>

                            <div class="col-md-6">
                                <input id="monto" type="text" class="form-control" name="monto" value="{{ $fondo->monto }}" required autofocus>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="banco" class="col-md-4 control-label">Banco</label>

                            <div class="col-md-6">
                                <input id="banco" type="text" class="form-control" name="banco" value="{{ $fondo->banco }}" required autofocus>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cuenta" class="col-md-4 control-label">Cuenta</label>

                            <div class="col-md-6">
                                <input id="cuenta" type="text" class="form-control" name="cuenta" value="{{ $fondo->cuenta }}" required autofocus>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Descripcion</label>
                            <div class="col-md-6">
                            <textarea name="descripcion" class="form-control" value="{{ $fondo->descripcion }}" required>{{ $fondo->descripcion }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                        <input name="fondo" type="hidden" value="{{ $fondo->id }}">
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
