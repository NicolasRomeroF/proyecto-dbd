@extends('layouts.app')

@section('content')
<!-- Añadir en los botones -->
<li>
      
      <a href="#">
        <i class="fa fa-thumbs-up"></i>
        <span>Administrar</span>
      </a>
      <ul>
        
        <li>
          <a href="/activeUser" >
            <i class="fa fa-eye"></i>
            <span>Ver usuarios activos</span>
          </a>

          <li>
          <a href="/medidas/generate" >
            <i class="fa fa-close"></i>
            <span>Desactivar usuario</span>
          </a>

      </ul>
</li>


<!-- Hacer vista nueva -->
<div class="container">
	<div class="row">
		<div class="span5">
            <table class="table table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>Nombre Usuario</th>
                      <th>Contraseña</th>
                      <th>E-Mail</th>
                      <th>Rol</th>
                      <th>Status</th>                                          
                  </tr>
              </thead>   
              <tbody>
                <!-- DAAAAAAAAANIIIIIIIIIIII acá va el foreach de todos los usuario -->
                <tr>
                    <td>Donna R. Folse</td>
                    <td>2012/05/06</td>
                    <td>Editor</td>
                    <td><span class="label label-success">Active</span>
                    </td>                                       
                </tr>
               
                <tr>
                    <td>Andrew A. Stout</td>
                    <td>2010/08/21</td>
                    <td>User</td>
                    <td><span class="label">Inactive</span></td>                                        
                </tr>
                                               
              </tbody>
            </table>
            </div>
	</div>
</div>
@endsection