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
                    <div class="panel-heading">Añadir artículo</div>
                    <form method="POST" action="{{ route('centrosdeacopio.articulos.store', $id_centro) }}" data-toggle="validator">
                        {{ csrf_field() }}
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tipo de articulo</label>
                                <input type="text" maxlength="40" name="tipo" class="form-control" placeholder="Tipo"  required>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nombre del artículo</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Cantidad</label>
                                <textarea name="cantidad" class="form-control" placeholder="Cantidad"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Descripcion</label>
                                <textarea name="descripcion" class="form-control" placeholder="Descripcion"></textarea>
                            </div>
                            <div class="form-group">
                                <center><button class="btn btn-primary" >Añadir</button>  </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection






