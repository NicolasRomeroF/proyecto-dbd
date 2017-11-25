      @extends('layouts.app')

      @section('content')
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

              <div class="panel-heading">Detalles de la catastrofe</div>
              <div class="panel-body">
                <div class="form-group">
                  <label class="col-md-12 control-label">Nombre de la catastrofe</label>
                  <p class="col-sm-12 control-label">{{ $catastrofe->nombre }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Fecha de la catastrofe</label>
                  <p class="col-sm-12 control-label">{{ $catastrofe->fecha }}</p>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Tipo</label>
                  <p class="col-sm-12 control-label">{{ $catastrofe->tipo }}</p><br>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label">Descripcion:</label>
                  <p class="col-md-12 control-label">{{ $catastrofe->descripcion }}</p>
                </div>
                <label class="col-md-12 control-label">Generar: </label>
                <table class="table table-sm">
                  <tbody>
                    <tr>
                      <th scope="col"><a class="btn btn-primary" href="/catastrofes/medidas/generatecentro/{{ $catastrofe->id }}">Centro de acopio</a></th>
                      <th scope="col"><a class="btn btn-primary" href="/catastrofes/medidas/generatebeneficio/{{ $catastrofe->id }}">Evento a beneficio</a></th>
                      <th scope="col"><a class="btn btn-primary" href="/catastrofes/medidas/generatefondo/{{ $catastrofe->id }}">Fondo</a>
                      </th>
                      <th scope="col"><a class="btn btn-primary" href="/catastrofes/medidas/generatedonacion/{{ $catastrofe->id }}">Donación</a>
                      </th>
                      <th scope="col"><a class="btn btn-primary" href="/catastrofes/medidas/generatevoluntariado/{{ $catastrofe->id }}">Voluntariado</a>
                      </th>

                    </tr>
                  </tbody>
                </table>
                

              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection