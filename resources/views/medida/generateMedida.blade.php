@extends('layouts.app')

 @section('scripts')
  @parent
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
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
                <div class="panel-heading">Declarar medida</div>
                <form method="POST" action="{{ route('medida.store') }}">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <div class="form-group"> 
                            <label class="col-md-4 control-label">Nombre de la medida</label>
                            <input name="nombre" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Fecha de Inicio</label>
                            <input name="fechaInicio" id="datepicker" class="form-control" placeholder="Elegir">
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Fecha de Termino</label>
                            <input name="fechaTermino" id="datepicker" class="form-control" placeholder="Elegir">
                        </div>
                        <div class="form-group"> 
                            <label class="col-md-4 control-label">Direccion</label>
                            <input name="direccion" class="form-control" placeholder="Ingrese direccion">
                        </div>
                        <div class="form-group"> 
                            <label class="col-md-4 control-label">Tipo de medida</label>
                            <select name="tipo" class="form-control" placeholder="Elegir">
                              <option value="Centro de acopio">Centro de acopio</option>
                              <option value="Evento beneficio">Evento beneficio</option>
                              <option value="Fondo">Fondo</option>
                              <option value="Voluntariado">Voluntariado</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Descripcion de la medida</label>
                            <textarea name="descripcion" class="form-control" placeholder="Descripcion de la medida"></textarea>
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






