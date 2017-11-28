@extends('layouts.app')

@section('styles')
  @parent
    <!-- Styles -->
   <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">-->
@stop

@section('content')
    
<div class="container">
    <div class="row">
    <div id="myCarousel" class="carousel  slide">
  <!-- Dot Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <!-- Items -->
  <div class="carousel-inner">
    <div class="active item">  <a href="https://www.chileprevencion.cl/"><img src="https://www.chileprevencion.cl/wp-content/uploads/2015/11/quienes-somos.png" class="img-responsive"></div></a>
    <div class="item">  <img src="http://mundosustentable.cl/modules/homeslider/images/6ea11d35149df34efe4205e603d6cca46399460f_mundoceleste.png" class="img-responsive"></div>
    <div class="item">  <img src="http://superpanel.mx/super-panel-qeretaro-01.jpg" class="img-responsive"></div>
  </div>
  <!-- Navigation -->
   <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="fa fa-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="fa fa-chevron-right" aria-hidden="true"></span>
        </a>
</div>
    </div>
</div>

    
    
@endsection

