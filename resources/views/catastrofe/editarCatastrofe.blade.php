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
               <select name="tipo" class="form-control" value="{{ $catastrofe->tipo }}" required>
                <option value=" {{$catastrofe->tipo}}">{{$catastrofe->tipo}}</option>
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
              <label for="name" class="col-md-4 control-label">Lugar</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="lugar" value="{{ $catastrofe->lugar }}" required autofocus>

              </div>
            </div>
            <div class="form-group">
              <label for="name" class="col-md-4 control-label">Latitud</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="latitud" value="{{ $catastrofe->latitud }}" required autofocus>

              </div>
            </div>
            <div class="form-group">
              <label for="name" class="col-md-4 control-label">Longitud</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="longitud" value="{{ $catastrofe->longitud }}" required autofocus>

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
