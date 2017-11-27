@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Catastrofe {{ $catastrofe->nombre }}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('catastrofe.update') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="nombre" value="{{ $catastrofe->nombre }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fecha" class="col-md-4 control-label">Fecha de la catastrofe</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="fecha" value="{{ $catastrofe->fecha }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipo" class="col-md-4 control-label">Tipo de catastrofe</label>

                            <div class="col-md-6">
                                 <select name="tipo" class="form-control" value="{{ $catastrofe->fecha }}" required>
                              <option value="Aluvion">Aluvion</option>
                              <option value="Erupción volcanica">Erupcion volcanica</option>
                              <option value="Incendio">Incendio</option>
                              <option value="Inundación">Inundación</option>
                              <option value="Terremoto">Terremoto</option>
                              <option value="Tsunami">Tsunami</option>   
                              <option value="Tsunami">Otro</option>     
                          </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Descripcion de la catastrofe</label>
                            <div class="col-md-6">
                            <textarea name="descripcion" class="form-control" value="{{ $catastrofe->descripcion }}" required>{{ $catastrofe->descripcion }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                        <input name="catastrofe" type="hidden" value="{{ $catastrofe->id }}">
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
