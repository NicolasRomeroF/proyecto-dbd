<!DOCTYPE html>
<html>
<head>
  <title>MovidosXCHile</title>
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="wrapper home">
    <header class="col-sm-12 col-md-12 col-lg-2">
        <div class="sidebar-nav row">
          <div class="brand-centered">
              <a class="sidebar-brand" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Logo_Gobierno_de_Chile_2010-2014.svg/1200px-Logo_Gobierno_de_Chile_2010-2014.svg.png');">
              </a>
          </div>
          <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <span class="visible-xs navbar-brand">Sidebar menu</span>
            </div>
            <div class="navbar-collapse collapse sidebar-navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active current"><a href="http://bootsnipp-env.elasticbeanstalk.com/iframe/qgj99">Home</a></li>
                <li><a href="/informacion">Conócenos!</a></li>
                <li><a href="/auth/login">Login</a></li>
                <li><a href="/auth/register">Regístrate!</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
    </header>
    <section class="col-md-12 col-lg-10 grids">
        <div class="row">
            @foreach ($catastrofes as $catastrofe)
            <div class="grid-item item1">
                <div class="content">
                    <div class="bg" style="background-image: url('https://scontent-scl1-1.xx.fbcdn.net/v/t34.0-12/23635400_1497082363741403_1974709921_n.png?oh=fc74592e06614292418ba55453aeca36&oe=5A0F8F07');"></div>
                    <div class="caption">
                        <div class="text">
                            <h3>{{$catastrofe->nombre}}</h3>
                            <p>{{$catastrofe->descripcion}} </p>
                            <span class="calltoaction"><a href="http://bootsnipp-env.elasticbeanstalk.com/iframe/7NMOl">Ver</a></span>                        
                        </div>                
                    </div>                
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <footer></footer>
    </div>
</body>
</html>

