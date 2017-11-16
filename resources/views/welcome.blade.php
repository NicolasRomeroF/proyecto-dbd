@extends('layouts.app')

@section('styles')
  @parent
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <style>
          <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MovidosXChile</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
  html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .thumbnail {
                position: relative;
            }

            .caption {
                position: absolute;
                top: 45%;
                left: 0;
                width: 100%;
                font-size: 250%;
                color: #FFFFFF;
            }
            .caption-text {
                color: #FFFFFF;
            }
</style>
@stop
@section('content')
    <div class="row" id="box-search">
        <div class="thumbnail text-center">
            <img src="http://www.concierto.cl/wp-content/uploads/2017/01/gabe-the-dog.jpg" alt="" class="img-responsive">
            <div class="caption">
                <p class="caption-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, quisquam?</p>
            </div>
        </div>
    </div>
@endsection
