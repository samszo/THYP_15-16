<!DOCTYPE html>
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="mapStyle.css" />
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <title>Google Maps JavaScript</title>
        
		<script src="https://maps.googleapis.com/maps/api/js"></script>
		<script>
			function initialize() {
				var mapCanvas = document.getElementById('map');
				var mapOptions = {
					center: new google.maps.LatLng(48.8, 4.98),
					zoom: 8,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				var map = new google.maps.Map(mapCanvas, mapOptions)
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>

    </head>
	
	<body>
	<header id="header">
			<h1>Cours sur la maîtrise d'une API Google</h1>
			<h2>Prefesseur : Yann MAHUT</h2>
			<h2>Etudiant : Yann MAHUT</h2>
	</header>
		
	<div id="container">
		<div id="map"></div>
	</div>

  </body>
</html>