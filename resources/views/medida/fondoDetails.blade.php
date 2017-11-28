      @extends('layouts.app')

      @section('content')
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

              <div class="panel-heading">Detalles del fondo</div>
              <div class="panel-body">
                <div class="form-group">
                  <label class="col-md-12 control-label">Nombre del fondo</label>
                  <p class="col-sm-12 control-label">{{ $fondo->nombre }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Catastrofe</label>
                  <p class="col-sm-12 control-label">{{ $fondo->catastrofe->nombre }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Estado</label>
                 @if($fondo->activo)
                    <p class="col-sm-12 control-label">Activo</p>
                  @else
                    
                    <p class="col-sm-12 control-label">Meta lograda</p>
                  @endif
                  </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Fecha de inicio</label>
                  <p class="col-sm-12 control-label">{{ $fondo->fecha_inicio }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Fecha de termino</label>
                  <p class="col-sm-12 control-label">{{ $fondo->fecha_termino }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Monto actual</label>
                  <p class="col-sm-12 control-label">{{ $fondo->montoActual }}</p><br>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Monto máximo</label>
                  <p class="col-sm-12 control-label">{{ $fondo->monto }}</p><br>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Banco</label>
                  <p class="col-sm-12 control-label">{{ $fondo->banco }}</p><br>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Cuenta</label>
                  <p class="col-sm-12 control-label">{{ $fondo->cuenta }}</p><br>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Descripcion:</label>
                  <p class="col-md-12 control-label">{{ $fondo->descripcion }}</p>
                </div>

                <a href= {{$fondo->id}}/comentarios/mostrar >
                  <button class="btn" type="button" >Ver Comentarios</button
                  ></a>
                  <a class="btn btn-info" href="/catastrofes/medidas/generatedonacion/{{$fondo->id}}">Donar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection