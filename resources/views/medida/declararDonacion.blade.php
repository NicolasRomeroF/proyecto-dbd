@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generar donacion para catastrofe: {{ $catastrofe->nombre }}</div>
                <form method="POST" action="{{ route('medida.storeDonacion') }}">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <div class="form-group"> 
                            <label class="col-md-4 control-label">Banco de origen</label>
                            <input name="banco" class="form-control" placeholder="Ingrese banco">
                        </div>
                        <div class="form-group"> 
                            <label class="col-md-4 control-label">Cuenta</label>
                            <input name="cuenta" class="form-control" placeholder="Ingrese cuenta">
                        </div>
                        <div class="form-group"> 
                            <label class="col-md-4 control-label">Monto a donar</label>
                            <input name="monto" class="form-control" placeholder="Ingrese monto">
                        </div>
                        <input name="catastrofe" type="hidden" value="{{ $catastrofe->id }}">
                        <div class="form-group"> 
                            <center><button class="btn btn-primary" >Donar</button>  </center>
                        </div>              
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>