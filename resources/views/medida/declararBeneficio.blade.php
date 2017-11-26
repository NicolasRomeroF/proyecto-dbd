@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Declarar evento a beneficio para catastrofe: {{ $catastrofe->nombre }}</div>
                <form method="POST" action="{{ route('medida.storeBeneficio') }}" data-toggle="validator">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <div class="form-group"> 
                            <label class="col-md-4 control-label">Nombre del evento a beneficio</label>
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