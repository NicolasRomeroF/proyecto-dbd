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
                <div class="panel-heading"> Voluntariado</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('medidas.update_voluntariado') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="nombre" value="{{ $voluntariado->nombre }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fecha" class="col-md-4 control-label">Fecha de inicio</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="fecha_inicio" value="{{ $voluntariado->fecha_inicio }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fecha" class="col-md-4 control-label">Fecha de termino</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="fecha_termino" value="{{ $voluntariado->fecha_termino }}" required>
                            </div>
                        </div>
                         <div class="form-group"> 
                            <label class="col-md-4 control-label">Region</label>
                            <div class="col-md-6">
                            <select id="region" name="region" class="form-control" placeholder="Elegir" required>
                              <option value=" {{$voluntariado->comuna->provincia->region->id}}">{{$voluntariado->comuna->provincia->region->nombre}}</option>
                              @foreach($regiones as $region)
                              <option value=" {{$region->id}}">{{$region->nombre}}</option>
                              @endforeach 
                          </select>
                          </div>
                        </div>
                        <div class="form-group"> 
                            <label class="col-md-4 control-label">Provincia</label>
                            <div class="col-md-6">
                            <select id="provincia" name="provincia" class="form-control" placeholder="Elegir" required>
                              <option value="{{$voluntariado->comuna->provincia->id}}">{{$voluntariado->comuna->provincia->nombre}}</option>
                              <option value="">Provincia</option>
                          </select>
                          </div>
                        </div>
                        <div class="form-group"> 
                          
                            <label class="col-md-4 control-label">Comuna</label>
                            <div class="col-md-6">
                            <select id="comuna" name="comuna" class="form-control" placeholder="Elegir" required>
                              <option value="{{$voluntariado->comuna->id}}">{{$voluntariado->comuna->nombre}}</option>
                              <option value="">Comuna</option>
                          </select>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Direccion</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ $voluntariado->direccion }}" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Labor</label>

                            <div class="col-md-6">
                                <input id="labor" type="text" class="form-control" name="labor" value="{{ $voluntariado->labor }}" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Descripcion</label>
                            <div class="col-md-6">
                            <textarea name="descripcion" class="form-control" value="{{ $voluntariado->descripcion }}" required>{{ $voluntariado->descripcion }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                        <input name="voluntariado" type="hidden" value="{{ $voluntariado->id }}">
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
