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
          $( "#datepicker" ).datepicker( "option", "dateFormat", 'dd/mm/yy');
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
                <div class="panel-heading">Enviar mensaje</div>
                <form method="POST" action="{{ route('catastrofe.store') }}">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <div class="form-group"> 
                            <label for="nombre" class="col-md-4 control-label">Nombre de la catastrofe</label>
                            <input name="name" class="form-control"></inputt>
                        <div class="form-group">
                            <label>Fecha de la catastrofe</label>
                            <input type="text" id="datepicker" class="form-control" placeholder="Choose">
                        </div>
                        <div class="form-group"> 
                            <label for="tipo" class="col-md-4 control-label">Tipo de catastrofe</label>
                            <input name="tipo" class="form-control"></inputt>
                        </div>
                        <div class="form-group"> 
                            <label for="nombre" class="col-md-4 control-label">Nombre de la catastrofe</label>
                            <input name="name" class="form-control"></inputt>
                        </div>
                        <div class="form-group"> 
                            <textarea name="descripcion" class="form-control" placeholder="Descripcion de la catastrofe"></textarea>
                        </div>
                        <div class="form-group"> 
                            <button class="btn btn-primary btn-block">Enviar</button>  
                        </div>              
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection






