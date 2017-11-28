<!DOCTYPE html>
<html>
<head>
  <title></title>


    <style type="text/css"><
    .content-header{
  font-family: 'Oleo Script', cursive;
  color:#fcc500;
  font-size: 45px;
}

.section-content{
  text-align: center; 

}
#contact{
    
  font-family: 'Teko', sans-serif;
  padding-top: 60px;
  width: 100%;
  width: 100vw;
  height: px;
  background: #3a6186; /* fallback for old browsers */
  background: -webkit-linear-gradient(to left, #3a6186 , #89253e); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to left, #3a6186 , #89253e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color : #fff;    
}
.contact-section{
  padding-top: 40px;
}
.contact-section .col-md-6{
  width: 50%;
}

.form-line{
  border-right: 1px solid #B29999;
}

.form-group{
  margin-top: 10px;
}
label{
  font-size: 1.3em;
  line-height: 1em;
  font-weight: normal;
}
.form-control{
  font-size: 1.3em;
  color: #080808;
}
textarea.form-control {
    height: 135px;
   /* margin-top: px;*/
}

.submit{
  font-size: 1.1em;
  float: right;
  width: 150px;
  background-color: transparent;
  color: #fff;

}

</style>



    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 90%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 90%;
        margin: 0;
        padding: 0;
      }

      .controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

.pac-container {
  font-family: Roboto;
}

#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}
#target {
  width: 345px;
}
</style>


<input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map" style ="top: 50px;"></div>

  <script type="text/javascript">
      // In the following example, markers appear when the user clicks on the map.
      // Each marker is labeled with a single alphabetical character.
      
   function geocodePosition(pos) {
var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                latLng: pos
            }, function (responses) {
                if (responses && responses.length > 0) {
                    $('#lugar_catastrofe').val(responses[2].formatted_address);
                    console.log(responses[2].formatted_address)
                } else {
                    
                }
            });
        }

      function initialize() {
        var bangalore = { lat: 12.97, lng: 77.59 };
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.4727088, lng: -70.7702575},
          zoom: 9,
          mapTypeId: 'roadmap'
        });


        // This event listener calls addMarker() when the map is clicked.
        google.maps.event.addListener(map, 'click', function(event) {
          addMarker(event.latLng, map, event.place);
        });
        

  // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location

            }));
            $("#latitud").val(place.geometry.location.lat());
            $("#longitud").val(place.geometry.location.lng());
            $('#lugar_catastrofe').val(place.name);
            
   geocodePosition(place.geometry.location);
            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

      // Adds a marker to the map.
      var marker;
      function addMarker(location, map) {
        // Add the marker at the clicked location, and add the next-available label
        // from the array of alphabetical characters.
       if ( marker ) {
      marker.setPosition(location);
    } else {
    marker = new google.maps.Marker({
      position: location,
      map: map,
    });

  }
  $('#lugar_catastrofe').val(name);
   $("#latitud").val(location.lat());
   $("#longitud").val(location.lng());
   geocodePosition(marker.getPosition());

      }
  google.maps.event.addDomListener(window, 'load', initialize);


    </script>
</head>

    

<body>

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<section id="contact">

<div class="container">




 <div class="section-content">
        <h1 class="section-header">Agregar <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Catastrofe</span></h1>
        <h3></h3>
      </div>
<div class="contact-section">
<div class="container">
  
<form  method="POST" action="{{ route('catastrofe.store') }}">
                        {{ csrf_field() }}
<fieldset>

<!-- Text input-->
<div class="col-md-6 form-line">
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyD8EUIYTNr5i2-s6XQiuqz-i-8zeFdVaxQ&callback=initialize"></script>

<label for="textinput">Clickee en el mapa para seleccionar lugar de la catastrofe o ingrese localización en buscador</label>  

<div class="form-group">
  <label for="textinput">Nombre Catastrofe</label>  
  <input id="nombre" name="nombre" placeholder="Nombre" class="form-control" required="" type="text">
</div>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

    <script>
    $("#nombre_tipo_catastrofe").hide();
        $(document).ready(function (){
            $("#tipo_catastrofe").change(function() {
                // foo is the id of the other select box 
                if ($(this).val() == "17") {
                    $("#nombre_tipo_catastrofe").show();
                }else{
                    $("#nombre_tipo_catastrofe").hide();
                } 
            });
        });
    </script>

<!-- Select Basic -->
<div class="form-group">
  <label for="selectbasic">Seleccionar Tipo</label>
    <select id="tipo_catastrofe" name="tipo_catastrofe" class="form-control">
      <option value="1">Incendio</option>
      <option value="2">Inundacion</option>
      <option value="3">Terremoto</option>
      <option value="4">Tsunami</option>
      <option value="5">Erupción Volcánica</option>
      <option value="6">Aluvión</option>
      <option value="7">Sequía</option>
      <option value="8">Temporal de lluvia</option>
      <option value="9">Marejadas</option>
      <option value="10">Tormentas de arena</option>
      <option value="11">Temperaturas extremas</option>
      <option value="12">Heladas</option>
      <option value="13">Avalanchas de nieve</option>
      <option value="14">Actividad Volcánica</option>
      <option value="15">Brote de enfermedades</option>
      <option value="16">Pandemia</option>
      <option value="17">Otros</option>
    </select>

</div>

<!-- Text input-->
<div class="form-group">
  <input id="nombre_tipo_catastrofe" name="nombre_tipo_catastrofe" style="display: none" placeholder="Otros" class="form-control" type="text">

</div>


<!-- Text input-->
<div class="form-group">
   <label for="textinput">Lugar Catastrofe</label>  

  <input id="lugar_catastrofe" name="lugar_catastrofe"  placeholder="Lugar" class="form-control" required="" type="text">

</div>

<!-- Text input-->
<div class="form-group">
   
  <input id="latitud" name="latitud"  placeholder="Lugar" class="form-control" style= "" required="" type="text">

</div>

<!-- Text input-->
<div class="form-group">

  <input id="longitud" name="longitud"  placeholder="Lugar" class="form-control" style="" required="" type="text">

</div>

<!-- Text input-->
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="FechaInicio">Fecha Inicio</label>  
 
  <input id="fecha_inicio" name="fecha_inicio" placeholder="dd-mm-aaaa" class="form-control" required="" type="date"> 
</div>

<!-- Textarea -->

<div class="form-group">
  <label  for="Descripcion">Descripcion</label>  
  
  <input id="descripcion" name="descripcion" placeholder="Descripcion" class="form-control" type="text">

  
 
</div>

<!-- Button -->
<div class="form-group">
  
    <button id="Submit" name="Submit" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>Agregar</button>

</div>
</div>
</form>
</fieldset>
</form>
</div>
</div>
</div>

</section>

</body>

</html>