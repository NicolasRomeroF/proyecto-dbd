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
                <div class="panel-heading">Declarar centro de acopio para catastrofe: {{ $catastrofe->nombre }}</div>
                <form method="POST" action="{{ route('medida.storeCentro') }}" data-toggle="validator">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <div class="form-group"> 
                            <label class="col-md-4 control-label">Nombre del centro</label>
                            <input name="nombre" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Fecha de Inicio</label>
                            <input type="date" name="fechaInicio" class="form-control" placeholder="Elegir" required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Fecha de Termino</label>
                            <input type="date" name="fechaTermino" class="form-control" placeholder="Elegir" required>
                        </div>
                        <div class="form-group"> 
                            <label class="col-md-4 control-label">Direccion</label>
                            <input name="direccion" class="form-control" placeholder="Ingrese direccion" required>
                        </div>
                        <div class="form-group"> 
                            <label class="col-md-4 control-label">Region</label>
                            <select id="region" name="region" class="form-control" placeholder="Elegir" required>
                              @foreach($regiones as $region)
                              <option value=" {{$region->id}}">{{$region->nombre}}</option>
                              @endforeach 
                          </select>
                        </div>
                        <div class="form-group"> 
                            <label class="col-md-4 control-label">Provincia</label>
                            <select id="provincia" name="provincia" class="form-control" placeholder="Elegir" required>
                              <option value="">Provincia</option>
                          </select>
                        </div>
                        <div class="form-group"> 
                            <label class="col-md-4 control-label">Comuna</label>
                            <select id="comuna" name="comuna" class="form-control" placeholder="Elegir" required>
                              <option value="">Comuna</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Descripcion</label>
                            <textarea name="descripcion" class="form-control" placeholder="Descripcion de la medida" required></textarea>
                        </div>
                        <input name="catastrofe" type="hidden" value="{{ $catastrofe->id }}">
                        <div class="form-group"> 
                            <center><button class="btn btn-primary" >Declarar</button>  </center>
                        </div>              
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>