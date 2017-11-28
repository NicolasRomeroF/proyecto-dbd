@extends('layouts.app')
<!DOCTYPE html>
<html>
<head>
  <title></title>



    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        width: 100%;
            height: 400px;
            float: left;
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

</head>

    

<body>

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


<div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="height:500px;">

              <div class="panel-heading">Haga click en el mapa para seleccionar un lugar</div>
<input id="pac-input" class="controls" type="text" placeholder="Search Box">
   <center><div id="map" style ="top: 50px;"></div></center> 

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

    </div>
    </div>
    </div>
    </div>
 <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">Declarar catastrofe</div>
              <form method="POST" action="{{ route('catastrofe.store') }}" data-toggle="validator">
                {{ csrf_field() }}
                <div class="panel-body">

                  <div class="form-group">
   <label for="textinput">Lugar Catastrofe</label>  

  <input id="lugar_catastrofe" name="lugar"  placeholder="Lugar" class="form-control" required="" type="text">

</div>

<!-- Text input-->
<div class="form-group">
   
  <input id="latitud" name="latitud"  placeholder="Latitud" class="form-control" style= "display: none" required="" type="text">

</div>

<!-- Text input-->
<div class="form-group">

  <input id="longitud" name="longitud"  placeholder="Longitud" class="form-control" style="display: none" required="" type="text">

</div>
                  <div class="form-group"> 
                    <label class="col-md-4 control-label">Nombre de la catastrofe</label>
                    <input type="text" maxlength="40" name="nombre" class="form-control" placeholder="Nombre"  required>
                  </div>
                  <div class="form-group">
                    <label class="col-md-4 control-label">Fecha de la catastrofe</label>
                    <input type="date" name="fecha" class="form-control" placeholder="Elegir" required>
                  </div>
                  <div class="form-group"> 
                    <label class="col-md-4 control-label">Tipo de catastrofe</label>
                    <select name="tipo" class="form-control" placeholder="Elegir" required>
                      <option value="Aluvion">Aluvion</option>
                      <option value="Erupción volcanica">Erupcion volcanica</option>
                      <option value="Incendio">Incendio</option>
                      <option value="Inundación">Inundación</option>
                      <option value="Terremoto">Terremoto</option>
                      <option value="Tsunami">Tsunami</option>   
                      <option value="Tsunami">Otro</option>     
                    </select>
                  </div>
                  
                  
                  <div class="form-group">
                    <label class="col-md-4 control-label">Descripcion de la catastrofe</label>
                    <textarea name="descripcion" class="form-control" placeholder="Descripcion de la catastrofe" required></textarea>
                  </div>
                  <div class="form-group"> 
                    <center><button class="btn btn-primary" >Declarar</button>  </center>
                  </div>              
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyD8EUIYTNr5i2-s6XQiuqz-i-8zeFdVaxQ&callback=initialize"></script>




</body>

</html>