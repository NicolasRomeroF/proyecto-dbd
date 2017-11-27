@extends('layouts.app')

 @section('scripts')
  @parent
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
   <script type="text/javascript">
  $(function() {
          $( "#datepicker" ).datepicker( "option", "dateFormat", 'dd-mm-yy');
  });
  </script>
  <script>
  $("#region").on('change',function(e){
    console.log(e);
    var id_region = e.target.value;
    id_region=Math.abs(id_region);
    console.log(id_region);

    $.get("{{url('/provincias')}}",{id_region: id_region},function(data){
      console.log('prueba');
      $('#provincia').empty();
      console.log(data);
      $.each(data, function(key, element) {
          $('#provincia').append('<option value="' + key + '">' + element + '</option>');
          console.log(element);
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


@section('styles')
  @parent
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Declarar catastrofe</div>
                <form method="POST" action="{{ route('catastrofe.store') }}" data-toggle="validator">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <div class="form-group"> 
                            <label class="col-md-4 control-label">Nombre de la catastrofe</label>
                            <input type="text" maxlength="40" name="nombre" class="form-control" placeholder="Nombre"  required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Fecha de la catastrofe</label>
                            <input type="date" name="fecha" class="form-control" placeholder="Elegir" required>
                        </div>
                        <div class="form-group"> 
                            <label class="col-md-4 control-label">Tipo de catastrofe</label>
                            <select name="tipo" class="form-control" placeholder="Elegir" required>
                              <option value="Aluvion">Aluvion</option>
                              <option value="Erupción volcanica">Erupcion volcanica</option>
                              <option value="Incendio">Incendio</option>
                              <option value="Inundación">Inundación</option>
                              <option value="Terremoto">Terremoto</option>
                              <option value="Tsunami">Tsunami</option>   
                              <option value="Tsunami">Otro</option>     
                          </select>
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
                            <label class="col-md-4 control-label">Descripcion de la catastrofe</label>
                            <textarea name="descripcion" class="form-control" placeholder="Descripcion de la catastrofe" required></textarea>
                        </div>
                        <div class="form-group"> 
                            <center><button class="btn btn-primary" >Declarar</button>  </center>
                        </div>              
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection






