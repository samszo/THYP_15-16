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
			var list_documents;
			var map;
			var markers = [];
			var hiddenCoords;
			var distance;
			
			function initMap() {
				var mapDiv = document.getElementById('map');
				var myLatlng = {lat: 48.945891, lng: 2.363193};
				var tab_position;
				
				map = new google.maps.Map(mapDiv, {
					center: myLatlng,
					zoom: 5
				});
				
				google.maps.event.addListener(map, 'click', function(event) {
					placeMarker(event.latLng);
					nb_clik = nb_clik + 1;
					if(nb_clik==1){
						tab_position = new Array(event.latLng);
					}else{
						tab_position.push(event.latLng)
					}
				});
				
				//Load Document
				loadDocuments();

			}
			function placeMarker(location){
				console.log('placeMarker');
				
				console.log('hiddenCoords:' + hiddenCoords);
				console.log('Marker:' + location);
				
				distance = google.maps.geometry.spherical.computeDistanceBetween(hiddenCoords,location)/1000;			
				console.log('distance : ' + distance);
				
				if(distance <200)
				{
					console.log('Victory');
					//success(event);
					$('<div id="maker_' + nb_clik + '" style="color:#F8F8FF;"></div>').html('Victoire !!!<br>').appendTo('#DatasMaker');
				}
				else{
					console.log('noob');
					var marker = new google.maps.Marker({
					position: location,
					map: map
					});
				  
					if(markers.length > 0) {
						markers[0].setMap(null);
					}
					
					markers[0] = marker;
					//document.getElementById("display-para").innerHTML ="à " + distance.toFixed(3) + " KM près";
					$('<div id="maker_' + nb_clik + '"></div>').html('à ' + distance.toFixed(3) + ' KM près<br>').appendTo('#DatasMaker');
				
				}
				
			}
			
			function loadDocuments(){
				var data = {"table":"document"};
				$.ajax({
					  url: 'bdd/r.php',
					  data: data,
					  success: function(html){
							//console.log(html);
							list_documents = JSON.parse(html);
							onDocumentsLoaded();
						}
					});
			}
			
			function onDocumentsLoaded(){
				//console.log(list_documents.length);
				var a = list_documents[getRandomIntInclusive(0,list_documents.length-1)];
				
				//console.log(a);
				
				document.getElementById("question").innerHTML = a[1];
				
				// load coords
				hiddenCoords = new google.maps.LatLng(+a[2],+a[3]);
				//console.log('lat:' + a[2] + ' lng:' + a[3]);
				
				//IMG
				icon = new Image();
				icon.src = a[4];
				document.imgquestion.src=eval("icon.src");

				
			}
			
			function getRandomIntInclusive(min, max) {
				return Math.floor(Math.random() * (max - min +1)) + min;
			}
			
			function fctStart(){
				hideElementById('start');
				showElementById('Restart');
				//Select a document and Load hidden Lat and long
				
			}
			
			function showElementById(attr) {
				document.getElementById(attr).style.display = "block";
			}

			function hideElementById(attr) {
				document.getElementById(attr).style.display = "none";
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
			<a href="index.php"> Retour Index</a>
	</header>
	
	<div id="start">
		<button type="button" onclick="fctStart()">Start a new game !</button>
	</div>
	<div id="Restart" style="display:none">
		<button type="button" onclick="fctStart()">ReStart the game !</button>
	</div>
	
	<div id="document">
		<h3 class="title-primary">Question</h3>
		<p id="question"></p>
		<img name="imgquestion" hspace=40 width=128 height=128 src="" />
	</div>
		
	<div id="container">
		<div id="map"></div>
		<div id="DatasMaker"></div>
	</div>

  </body>
</html>