<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @section('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src='https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js'></script>


    
    @show


</head>
<body>
      
	    <ul class="drawer">
	    @guest
	    <a href="/auth/login">
	      <i class="fa fa-user"></i>
	      <span>Ingresar</span>
	    </a>
	    <a href="/auth/register">
	      <i class="fa fa-user-plus"></i>
	      <span>Registrarse</span>
	    </a>
	    
	    @else
	  <li>
	   
	    <a href="#">
	      <i class="fa fa-folder"></i>
	      <span>Perfil</span>
	    </a>
	    <ul>
	      <li>
	        <a href="https://ianlunn.github.io/Hover/" >
	          <i class="fa fa-flash"></i>
	          <span>Detalles</span>
	        </a>
	      </li>
	      <li>
	        <a href="/perfil">
	          <i class="fa fa-ellipsis-h"></i>
	          <span>Configurar Perfil</span>
	        </a>
	      </li>
	      <li>
	        <a href="https://ianlunn.co.uk/plugins/jquery-parallax/" >
	          <i class="fa fa-dot-circle-o"></i>
	          <span>Historial</span>
	        </a>
	      </li>
	      <li>
        	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-dot-circle-o"></i>
            <span>Salir</span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
            </form>
            </a>
          </li>
            

	    </ul>
	  </li>
	  <li>
	     <a href="#">
	      <i class="fa fa-folder-open"></i>
	    <span>Catástrofes</span>
	    </a>
	    <ul>
	         <li>
	        <a href="/catastrofes/historial" >
	          <i class="fa fa-info-circle"></i>
	          <span>Historial</span>
	        </a>
	      </li>
	      <li>
	        <a href="/catastrofes/add" >
	          <i class="fa fa-question-circle"></i>
	          <span>Añadir catastrofe</span>
	        </a>
	      </li>
	      <li>
	        <a href="https://ianlunn.co.uk/" >
	          <i class="fa fa-question-circle"></i>
	          <span>Centros de Acopio</span>
	        </a>
	      </li>
	      <li>
	        <a href="https://ianlunn.co.uk/about/" >
	          <i class="fa fa-question-circle"></i>
	          <span>Eventos a Beneficio</span>
	        </a>
	      </li>
	      <li>
	        <a href="https://ianlunn.co.uk/contact/" >
	          <i class="fa fa-question-circle"></i>
	          <span>Donaciones</span>
	        </a>
	      </li>
	    </ul>
	  </li>
	  <li>
	  	
	    <a href="#">
	      <i class="fa fa-thumbs-up"></i>
	      <span>Medidas</span>
	    </a>
	    <ul>
	      
	      <li>
	        <a href="/medidas/generate" >
	          <i class="fa fa-plus"></i>
	          <span>Añadir medidas</span>
	        </a>
	    </ul>
	  </li>
	  
	  @endguest
	  <li>

	    <a href="#">
	      <i class="fa fa-share-alt"></i>
	      <span>Social</span>
	    </a>
	    <ul>
	      
	      <li>
	        <a href="https://twitter.com/IanLunn/" >
	          <i class="fa fa-twitter"></i>
	          <span>Twitter</span>
	        </a>
	    </ul>
	  </li>
	  <li>
	  <a href="/informacion">
	      <i class="fa fa-info"></i>
	      <span>Conocenos</span>
	    </a>
	    </li>
	</ul>
        @if (session()->has('flash'))
            <div class="container">
                <div class="alert alert-success">{{ session('flash') }}</div>
            </div>
        @endif

        @yield('content')

    </div>
    

    <!-- Scripts -->
    @section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    @show
</body>
</html>




