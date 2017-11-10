@extends('layouts.app')

@section('content')

@foreach($catastrofes as $catastrofe)
	<div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	            	<div class="panel-body">
	                <div class="panel-heading"> <b>{{ $catastrofe->nombre }}</b></div>
	                <p class="col-sm-4 control-label"><small>Fecha: {{ $catastrofe->fecha }}</small></p>
	                <p class="col-sm-4 control-label"><small>Tipo: {{ $catastrofe->tipo }}</small></p><br>
	                <label class="col-md-12 control-label">Descripcion:</label>
	                <p class="col-md-12 control-label">{{ $catastrofe->descripcion }}</p>
	                <button class="btn btn-primary btn-block">Generar medida</button>  
	            </div>
	                
	            </div>
	        </div>
	    </div>
	</div>
@endforeach
@endsection