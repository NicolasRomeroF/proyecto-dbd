@extends('layouts.app')
@section('scripts')
@parents
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
  $("#region").on('change',function(e){
    console.log(e);
    var id_region = e.target.value;
    id_region=Math.abs(id_region);

    $.get("{{url('/provincias')}}",{id_region: id_region},function(data){
      $('#provincia').empty();
      console.log(data);
      $.each(data, function(key, element) {
          $('#provincia').append('<option value="' + key + '">' + element + '</option>');
        });
    });
  });   
  </script>
  <script>
  $("#provincia").on('change',function(e){
    console.log(e);
    var id_provincia = e.target.value;
    id_provincia=Math.abs(id_provincia);

    $.get("{{url('/comunas')}}",{id_provincia: id_provincia},function(data){
      $('#comuna').empty();
      console.log(data);
      $.each(data, function(key, element) {
          $('#comuna').append('<option value="' + key + '">' + element + '</option>');
        });
    });
  });   
  </script>
  @stop
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
