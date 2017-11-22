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
                    <div class="panel-heading">Ingresar información de centro de acopio</div>
                    <form method="POST" action="{{ route('centrosdeacopio.store') }}" data-toggle="validator">
                        {{ csrf_field() }}
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nombre del centro de acopio</label>
                                <input type="text" maxlength="40" name="nombre" class="form-control" placeholder="Nombre"  required>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Situación del centro de acopio</label>
                                <input name="situacion"  class="form-control" placeholder="Situación" required>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Descripcion del centro de acopio</label>
                                <textarea name="descripcion" class="form-control" placeholder="Descripción"></textarea>
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









