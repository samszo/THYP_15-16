<!DOCTYPE html>
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="mapStyle.css" />
		<script src="../js/jquery.min.js" ></script>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <title>Google Maps JavaScript</title>

		<script type="text/javascript">
			var nb_clik = 0;
			var map;
			
			function initMap() {
				var mapDiv = document.getElementById('map');
				var myLatlng = {lat: 48.945891, lng: 2.363193};
				map = new google.maps.Map(mapDiv, {
					center: myLatlng,
					zoom: 16
				});
				
				google.maps.event.addListener(map, 'click', function(event) {
					placeMarker(event.latLng);
					nb_clik = nb_clik + 1;
				});
				
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.open(map,marker);
				});
			}
			function placeMarker(location){
				var marker = new google.maps.Marker({
					position: location,
					map: map,
				});
				var infowindow = new google.maps.InfoWindow({
					content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
				});
				//infowindow.open(map,marker);
				
				$('<div id="maker_' + nb_clik + '"></div>').html('<p>latitude : '+ location.lat() +' et longitude : ' + location.lng() + '</p>').appendTo('#DatasMaker');
			}
		</script>
		
		<script async defer
			src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyBHqGiW6m4xgpTub0XgUqFoBlJsr8e3hW0&libraries=geometry&callback=initMap">
		</script>

    </head>
	
	<body>
	<header id="header">
			<h1>Cours sur la maîtrise d'une API Google</h1>
			<h2>Professeur : Samuel Szoniecky</h2>
			<h3>Etudiant : Yann Mahuet</h3>
	</header>
		
	<div id="container">
		<div id="map"></div>
		<div id="DatasMaker"></div>
	</div>

  </body>
</html>