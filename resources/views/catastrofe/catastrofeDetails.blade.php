    @extends('layouts.app')

    @section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">

            <div class="panel-heading">Detalles de la catastrofe</div>
            <div class="panel-body">
              <label class="col-md-12 control-label">Nombre de la catastrofe</label>
              <p class="col-sm-12 control-label">{{ $catastrofe->nombre }}</p>
              <label class="col-md-12 control-label">Fecha de la catastrofe</label>
              <p class="col-sm-4 control-label">{{ $catastrofe->fecha }}</p>
              <label class="col-md-12 control-label">Tipo</label>
              <p class="col-sm-4 control-label">{{ $catastrofe->tipo }}</p><br>
              <label class="col-md-12 control-label">Descripcion:</label>
              <p class="col-md-12 control-label">{{ $catastrofe->descripcion }}</p>

              

            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection