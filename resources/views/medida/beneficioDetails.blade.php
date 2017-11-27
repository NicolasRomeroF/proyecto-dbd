      @extends('layouts.app')

      @section('content')
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

              <div class="panel-heading">Detalles del evento</div>
              <div class="panel-body">
                <div class="form-group">
                  <label class="col-md-12 control-label">Nombre del evento</label>
                  <p class="col-sm-12 control-label">{{ $beneficio->nombre }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Fecha de inicio</label>
                  <p class="col-sm-12 control-label">{{ $beneficio->fecha_inicio }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Fecha de termino</label>
                  <p class="col-sm-12 control-label">{{ $beneficio->fecha_termino }}</p>
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
                  <p class="col-sm-12 control-label">{{ $beneficio->direccion }}</p><br>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Descripcion:</label>
                  <p class="col-md-12 control-label">{{ $beneficio->descripcion }}</p>
                </div>

                <a href= {{$beneficio->id}}/comentarios/mostrar >
                  <button class="btn" type="button" >Ver Comentarios</button
                  ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection