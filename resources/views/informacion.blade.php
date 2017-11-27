@extends('layouts.app')

@section('content')
<div class="panel panel-default">
<div class="container animated fadeIn">

  <div class="row">
    <h1 class="header-title"> Contacto </h1>
    <hr>
    <div class="col-sm-12" id="parent">
    	<div class="col-sm-6">
    	<iframe width="100%" height="320px;" frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3328.960951529437!2d-70.6866704850829!3d-33.450323854891316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c4f80b6efd4d%3A0xea48b2f11840708f!2sUniversidad+de+Santiago+de+Chile!5e0!3m2!1ses-419!2scl!4v1510929910484" allowfullscreen></iframe>
    	</div>

<!-- Información de la derecha -->
    	<div class="text">
                            <h3> Sobre Nosotros ...</h3>
                            <p>Somos una institución que busca ayudar en situaciones de emergencia... </p>
                                                    
                        </div>      
    </div>
  </div>


        <!-- Cuadros de texto inferiores -->
  <div class="container second-portion">
	<div class="row">
    	<div class="col-xs-12 col-sm-6 col-lg-4">
			<div class="box">							
				<div class="icon">
					<div class="image"><i class="fa fa-envelope" aria-hidden="true"></i></div>
					<div class="info">
						<h3 class="title">E-MAIL:</h3>
						<p>
							<i class="fa fa-envelope" aria-hidden="true"></i> &nbsp movidosxchile@gmail.com
						</p>
					
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
			
        <div class="col-xs-12 col-sm-6 col-lg-4">
			<div class="box">							
				<div class="icon">
					<div class="image"><i class="fa fa-mobile" aria-hidden="true"></i></div>
					<div class="info">
						<h3 class="title">TELÉFONO:</h3>
    					<p>
							<i class="fa fa-mobile" aria-hidden="true"></i> &nbsp (+569) XXXXXXXX
							<br>
							<br>
							<i class="fa fa-mobile" aria-hidden="true"></i> &nbsp  (+562) XXXXXXXX 
						</p>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
			
        <div class="col-xs-12 col-sm-6 col-lg-4">
			<div class="box">							
				<div class="icon">
					<div class="image"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
					<div class="info">
						<h3 class="title">DIRECCIÓN:</h3>
    					<p>
							 <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp Av Libertador Bernardo O'Higgins 3363, Santiago, Estación Central, Región Metropolitana
						</p>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>		    
		<!-- /Boxes de Acoes -->
		
		<!--My Portfolio  dont Copy this -->
	    
	</div>
</div>

</div>
</div>
@endsection