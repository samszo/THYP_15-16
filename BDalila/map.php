<!DOCTYPE html>
<html>
  <head>
    <h2>MAPS</h2>
<h1>La Carte</h1>
<center><p class="question">Ou se trouve se club <img src="img/real.png" width="50" height="40" /> ?
</p></center>
    <style type="text/css">
    p.question {
    color:#0F470A;
    font-size: 200%
}
      html, body { 
      height: 100%; margin: 0; padding: 0; }
     
      #map { height: 50%; border:3px outset #750B1F;
    padding:10px ; margin:30px;;
      }
      body {
    background-color: #FAB6B7;
}
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script type="text/javascript">
var map;
var markers = [];
function initMap() {
  var haightAshbury = {lat: 40.313043, lng: -3.669434};
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: haightAshbury,
    mapTypeId: google.maps.MapTypeId.HYBRID 
  });
  // This event listener will call addMarker() when the map is clicked.
  map.addListener('click', function(event) {
    addMarker(event.latLng);
    alert("distance"+event.latLng.lng);
  });
  // Adds a marker at the center of the map.
}
function distance(){
var lat= 0;
var lng=0;
}
function addMarker(location) {
    setMapOnAll(null);
  var marker = new google.maps.Marker({
    position: location,
    map: map
  });
  markers.push(marker);
}
function deleteMarkers() {
  clearMarkers();
  markers = [];
}
function clearMarkers() {
  setMapOnAll(null);
}
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}
    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtl4qOlHXTQ_3phq40KY69wNgF0YLfovk&callback=initMap">
    </script>
    <h1> Resultat </h1>
  </body>
</html>