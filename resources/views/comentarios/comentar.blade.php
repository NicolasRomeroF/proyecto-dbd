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
                    <div class="panel-heading">Escribir Comentario</div>
                    @foreach($medida as $medida)
                    @if($medida->tipo == 'beneficio')
                    <form method="POST" action="{{ route('guardarComentario', $id_medida) }}"  data-toggle="validator">
                     @elseif ($medida->tipo == 'centro')
                            <form method="POST" action="{{ route('guardarComentarioCentro', $id_medida) }}"  data-toggle="validator">

                                @elseif ($medida->tipo == 'centro')
                                    <form method="POST" action="{{ route('guardarComentarioCentro', $id_medida) }}"  data-toggle="validator">

                                        @elseif ($medida->tipo == 'voluntariado')
                                            <form method="POST" action="{{ route('guardarComentarioVoluntariado', $id_medida) }}"  data-toggle="validator">

                            @endif

                         @endforeach
                        {{ csrf_field() }}
                        <div class="panel-body">t
                            <div class="form-group">
                                <label class="col-md-4 control-label">Comentario</label>
                                <input type="text" maxlength="40" name="comentario" class="form-control" placeholder="Comentario"  required>
                            </div>
                            <div class="form-group">
                                <center><button class="btn btn-primary" >Comentar</button>  </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection






