@extends('layouts.app')

@section('styles')
  @parent
    <!-- Styles -->
   <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">-->
@stop

@section('content')
    
    
    <section class="col-lg-12 col-lg-10 grids" color="#7E8BA9">
        <div class="row">
            @foreach ($catastrofes as $catastrofe)
            <div class="grid-item item1">
                <div class="content">
                    <div class="bg" style="background-image: url('https://misanimales.com/wp-content/uploads/2016/10/crecen-los-gatos.jpg');"></div>
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

    
    
@endsection

