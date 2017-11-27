@extends('layouts.app')

@section('content')
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

              <div class="panel-heading">Detalles del voluntariado</div>
              <div class="panel-body">
                <div class="form-group">
                  <label class="col-md-12 control-label">Nombre</label>
                  <p class="col-sm-12 control-label">{{ $voluntariado->nombre }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Catastrofe</label>
                  <p class="col-sm-12 control-label">{{ $voluntariado->catastrofe->nombre }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Fecha de inicio</label>
                  <p class="col-sm-12 control-label">{{ $voluntariado->fecha_inicio }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Fecha de termino</label>
                  <p class="col-sm-12 control-label">{{ $voluntariado->fecha_termino }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Region</label>
                  <p class="col-sm-12 control-label">{{ $region->nombre }}</p><br>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Provincia</label>
                  <p class="col-sm-12 control-label">{{ $provincia->nombre }}</p><br>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Comuna</label>
                  <p class="col-sm-12 control-label">{{ $comuna->nombre }}</p><br>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Direccion</label>
                  <p class="col-sm-12 control-label">{{ $voluntariado->direccion }}</p><br>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Labor</label>
                  <p class="col-sm-12 control-label">{{ $voluntariado->labor }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Descripcion:</label>
                  <p class="col-md-12 control-label">{{ $voluntariado->descripcion }}</p>
                </div>
                

              </div>
            </div>
          </div>
        </div>
      </div>