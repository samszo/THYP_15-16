<?php 
include "mykey.php";
?>
<!DOCTYPE html>
<html>
  <head>
     
	 <link rel="stylesheet" href="style.css" />
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
     <script type="text/javascript" src="http://w2ui.com/src/w2ui-1.4.2.min.js"></script>
  </head>
  <body>
     
     <div id="titre" style="height: 50px ">Map Game</div>
	 <div id="titre-connexion"> Connectez-vous !</div>
	
	 <div id="connexion"> 
	 
	 <input type="text" id="nom" value="" style="border:solid 1px black; color:#3a5795; border-radius:5px; display:block; float:left; width: 300px; height:30px;" />
	 <button type="submit" style="color: white; border-radius: 4px; text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2); margin-left: 305px; background-color: rgba(22, 122, 198, 1); display:block; width: 200px; height:30px;" onClick="JoueurExiste()">se connecter</button>
	 </div>
	 <div id="afficheNom"></div><br>
	 <div id="question">
	 <center>
     
	 <div id="img">
	 	 Trouvez la ville d'origine de ce document: 
<br><br>
	 <img class = "imag" id="Img" src="images/google.jpg"  align="center" width=100px height=100px/>
	 </div> <br>
	 
	<label id="compteur"></label><br>
	<label id="dis"></label></center>
	 </div>
	 
	 <div id="map"></div>

    <script type="text/javascript">
	
	function JoueurExiste() {
		  var name;
          name = document.getElementById("nom").value;
          if (name.trim() != "") {
           creaPersonne({
            "nom": name
          });
            document.getElementById("question").style.display = "block";
			document.getElementById("map").style.display = "block";
			document.getElementById("connexion").style.display = "none";
			document.getElementById("titre-connexion").style.display = "none";
			document.getElementById("afficheNom").innerHTML="Vous etes connecte: "+ name;
			initMap();
          }
          
        }
			var map;
			var markers = [];
			var point;
			var compteur=5;
			var distance=0;

			function initMap() {
			  var haightAshbury = {lat: 37.775091, lng: -122.418922};
			  document.getElementById("compteur").innerHTML="il vous reste "+ compteur + "chances";
			  document.getElementById("dis").innerHTML="la distance entre votre choix et l'emplacement est de "+distance+ " km";
			  map = new google.maps.Map(document.getElementById('map'), {
				zoom: 3,
				center: haightAshbury,
				mapTypeId: google.maps.MapTypeId.TERRAIN
			  });
				point = new google.maps.LatLng({lat: 39.002673,lng:-122.596810});
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
					scale: 15
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
				alert ("VOUS AVEZ GAGNÉ");
				compteur=5;
			  }
			  if (compteur==0){
				alert("VOUS AVEZ PERDU! RECOMMENCEZ");
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

			function creaPersonne(data) {
						  
						  data.table = "personne";
						  $.get('c.php', data,function(){
							$.ajax({
							  url: 'r.php',
							  data: data,
							});
						  });
						  
						}



    </script>
	
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apiGMap;?>&callback=initMap">
    </script>
  </body>
</html>