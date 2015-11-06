<!DOCTYPE html>
<html>
 
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
    <link href="/style.css" rel="stylesheet" type="text/css" media="all">
    <title>Entrega 5 - BBDD</title>
    <style>
      #map {
        height : 600px; /* IMPERATIF */
        width : 600px;
        margin : 20px;
        border : 1px solid #888;
      }
    </style>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
 
      function initCarte(){
        // création de la carte
        var map = new google.maps.Map( document.getElementById('map'),{
          'center' : new google.maps.LatLng( 46.80, 1.70),
          'zoom' : 16
        });
        if (navigator.geolocation)
          var watchId = navigator.geolocation.watchPosition(localizacion,null,{enableHighAccuracy:true});
        else
          alert("Votre navigateur ne prend pas en compte la géolocalisation HTML5");
 
      function localizacion(position){
        map.panTo(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
        var marker = new google.maps.Marker({
        position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude), 
        map: map
        }); 
      }
      }
      google.maps.event.addDomListener( window, 'load', initCarte);
      google.maps.event.addListener(map, 'click', function (event) {
         new google.maps.Marker({
	 map: map,
	 position: event.latLng
         });
      });
    </script>
  </head>
 
  <body>
 
    <h1>Geolocalisation et Cartes/h1>
    <div id="map"></div>
 
  </body>
 
 
</html>