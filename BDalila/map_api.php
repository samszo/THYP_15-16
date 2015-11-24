<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
    
      #map { height: 500px;
            width: 800px;
            margin: 30px auto; padding: 0;  border:0px inset;}	
	  h1{ font-size:35px; text-align: center; border:0px outset; color:  Black ; background-color: #77B5FE; margin-top: 0px;}
	  .imag:hover {transform: scale(1.2);  -moz-transition: all 0.2s ease-in-out 0s;  -webkit-transition: all 0.2s ease-in-out 0s;  -o-transition: all 0.2s ease-in-out 0s;  -ms-transition: all 0.2s ease-in-out 0s;  transition: all 0.2s ease-in-out 0s;}
    h2{}
	</style>
  </head>
  <body>
     <h1>Bonjour 
	 
	<?php
	include_once 'connect.php'; 
	echo $nom= $_POST['Nom']; 
	
	$sql = "INSERT INTO personnes (nom)
	VALUES ('". $nom."')";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	  //  echo "New record created successfully";
	} else {
	  //  echo "Error: " . $sql . "<br>" . $conn->error;
	}	

$conn->close();?> Essayez de trouver Paris</h1> <br>
<h2><center><label id="compteur"></label></center>
	<center><label id="dis"></label></center></h2>
    <div id="map"></div>
	
    <script type="text/javascript">
var map;
var markers = [];
var point;
var compteur=5;
var distance=0;
function initMap() {
  var haightAshbury = {lat: 37.775091, lng: -122.418922};
  document.getElementById("compteur").innerHTML="Vous avez "+ compteur + "chances";
  document.getElementById("dis").innerHTML="Vous &#234;tes &#224; "+ distance + " km de Paris";
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 3,
    center: {lat: -34.397, lng: 150.644},
    mapTypeId: google.maps.MapTypeId.TERRAIN
  });
	point = new google.maps.LatLng({lat: 48.855159, lng: 2.361385});
  // This event listener will call addMarker() when the map is clicked.
  map.addListener('click', function(event) {
	  deleteMarkers();
    addMarker(event.latLng);
  });
	var triangleCoords = [
    {lat: 39.002673, lng: -122.596810},
    {lat: 37.427623, lng: -123.168233},
    {lat: 37.870482, lng: -121.575689}
  ];
  var bermudaTriangle = new google.maps.Polygon({paths: triangleCoords});
  google.maps.event.addListener(map, 'click', function(e) {
    var resultColor =
        google.maps.geometry.poly.containsLocation(e.latLng, bermudaTriangle) ?
        'green' :
        'red';
    new google.maps.Marker({
      position: e.latLng,
      map: map,
      icon: {
        path: google.maps.SymbolPath.CIRCLE,
        fillColor: resultColor,
        fillOpacity: .3,
        strokeColor: 'white',
        strokeWeight: .10,
        scale: 7
      }
    });
  });
  
}
// Adds a marker to the map and push to the array.
function addMarker(location) {
setMapOnAll(null);
	var marker = new google.maps.Marker({
    position: location,
      map: map
  });
  markers.push(marker);
  distance = parseInt( google.maps.geometry.spherical.computeDistanceBetween( point, markers[markers.length-1].getPosition())/1000);
  compteur--;
  if (distance < 200){
    alert ("Bravooooo!");
    compteur=5;
  }
  if (compteur==0){
    alert("Perdu!! Réessayez encore");
    compteur =5;
  
  }
document.getElementById("compteur").innerHTML="il vous reste "+ compteur + "chances";
document.getElementById("dis").innerHTML="la distance de votre point est "+distance+ " km";
}
// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
  
}
// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setMapOnAll(null);
}
// Shows any markers currently in the array.
function showMarkers() {
  setMapOnAll(map);
}
// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
}
    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxDbeCmD14YlNm4FwdgFjLyHOckWxZhMc&callback=initMap">
    </script>
  </body>
</html>