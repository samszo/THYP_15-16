
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> SamiaMALKI</title>
    <style type="text/css">
        html, body{
            height: 100%;
            margin: 0;
            padding: 0;
            font-weight: 100;
            font-family: helvetica;
        }

     #map { width: 1400px; 
	 height: 500px; 
	 margin-top: 100px;
	 margin-left: -50px;
	 padding: 0; 
	 border:2px inset;
	 }	
	 
	  h1 {
		  
		   margin-top: 45px;
		  
	  }
	 
   
        p {
            text-align: center;
            font-weight: 100;
            font-size: 50px;
            background-color: #FFE436;
            margin-top: 100px;
            color: white;
            height: 60px;
            line-height: 52px;
			margin-top: -600px;
        }

        .question {
            text-align: center;
            font-weight: 0;
            background-color: #FFE436;
            color: white;
            height: 10px;
            font-size: 29px;
            font-weight: 100;
            line-height: 92px;
			
        }

        }
    </style>
</head>
<body>



<div id="map">


</div>
<div class="question">
    <p>  <?php
	include_once 'connect.php'; 
echo $nom= $_POST['nom']; 
$sql = "INSERT INTO personnes (nom)
VALUES ('". $nom."')";
//echo $sql;
if ($conn->query($sql) === TRUE) {
   //echo "New record created successfully";
} else {
  // echo "Error: " . $sql . "<br>" . $conn->error;
} 

$conn->close();?>  <b id="place">essaye de trouver la Tunisie </b> !!</p>
</div> 
<h1><center><label id="compteur"></label></center><h1>
<h1><center><label id="dis"></label></center><h1>
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
  //document.getElementById("dis").innerHTML="Vous &#234;tes &#224; "+ distance + " km de Paris";
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 3,
    center: {lat: -34.397, lng: 150.644},
    mapTypeId: google.maps.MapTypeId.TERRAIN
  });
point = new google.maps.LatLng({lat: 36.8064948, lng: 10.1815316});
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
        scale: 10
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
    alert ("Bravo !!");
    compteur=5;
  }
  if (compteur==0){
    alert("Réessayez");
    compteur =5;
  
  }
document.getElementById("compteur").innerHTML="il vous reste "+ compteur + "chances";
//document.getElementById("dis").innerHTML="la distance de votre point est "+distance+ " km";
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
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqgEu8Zs5vzayYxtCGH69YCXw-L4pG1Dw&callback=initMap">
</script>
</body>
</html>