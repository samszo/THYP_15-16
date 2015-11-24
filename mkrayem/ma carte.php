<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="style.css"/>
    <style type="text/css">
<<<<<<< HEAD
      #aa{
		  padding-left:10px;
=======
      
	  #titre{
		 padding-left:600px;
<<<<<<< HEAD
	     background-color : #4BB5C1;		 
=======
		 padding-top: 0px;
	background-color : #4BB5C1;		 
<<<<<<< HEAD
>>>>>>> origin/master
=======
>>>>>>> 367be944bbf6657860a65290a96960503adeff55
>>>>>>> b3c125aa5193ea38cfd5aae8d8a73ff90be22d89
>>>>>>> 7fd687aed84af6cbdcfad5b317a28b17171a28c3
	  }
    </style>
	
  </head>
  <body onLoad="setup()">
  <div id="titre">
		<h1>Jeux carte</h1>
  </div>
  <div id="aa">
 <script>
	var lgGithub=("Votre github");
var github=prompt(lgGithub, " ");
if (github ==" ");

if (lgGithub ==" ") {
  alert("Erreur veuillez reessayer");
}
else
if (github !=" ");
  { 
    document.write("<h2>"+"<tect>"+ " bienvenue sur notre jeux: "+github+"</tect>"+"</h2>");
}


//
 var name;

        var myStyle = [{
            featureType: "administrative",
            elementType: "labels",
            stylers: [{
                visibility: "off"
            }]
        }, {
            featureType: "poi",
            elementType: "labels",
            stylers: [{
                visibility: "off"
            }]
        }, {
            featureType: "water",
            elementType: "labels",
            stylers: [{
                visibility: "off"
            }]
        }, {
            featureType: "road",
            elementType: "labels",
            stylers: [{
                visibility: "off"
            }]
        }];
        var map;
        var markers = [];
        var poly;
        var nbclic = '0';

        function affichage()
        {
            name = document.getElementById("prenom").value;
            creaPersonne({
                "nom": name
            });
            document.getElementById("container").style.display = "none";
            document.getElementById("map").style.display = "block";
            document.getElementById("resultat").style.display = "block";
            document.getElementById("m").style.display = "block";
            document.getElementById("id1").style.display = "block";

            initMap();
        }


        function initMap() {

            map = new google.maps.Map(document.getElementById('map'), {
                mapTypeControlOptions: {
                    mapTypeIds: ['mystyle', google.maps.MapTypeId.ROADMAP]
                },
                center: {
                    lat: 48.945567,
                    lng: 2.363268
                },
				
                zoom: 5,
                mapTypeId: 'mystyle'
            });

            map.mapTypes.set('mystyle', new google.maps.StyledMapType(myStyle, {
                name: 'Cacher les villes'
            }));

            map.addListener('click', function(event) {
                addMarker(event.latLng);
            });

            




        }



        function addMarker(location) {


            setMapOnAll(null);
            nbclic = parseInt(nbclic) + 1;

            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            point = new google.maps.LatLng({
                lat: 48.855159,
                lng: 2.361385
            });

            markers[0] = marker;
            var distance = parseInt(google.maps.geometry.spherical.computeDistanceBetween(point, markers[0].getPosition())) ;
            
            creaScore({
                "id_doc": 2,
                "id_perso": 2,
                "distance": distance
            });

            

            poly = new google.maps.Polyline({
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 3,
                map: map,
            });


            var path = [marker.getPosition(), point];
            if (nbclic > 4) {
                poly.setPath(path);
                document.getElementById('resultat').innerHTML = "vous êtes à " + distance / 1000 + " km, vous avez perdu!!!";

                nbclic = 0;
            } else if (nbclic == 5) {
                initMap();
            } else {
                deleteMarkers();
                document.getElementById('resultat').innerHTML = "vous êtes à " + distance / 1000 + " km";
            }


            if (distance < 7000) {
                document.getElementById('resultat').innerHTML = "VOUS AVEZ GAGNÉ";
                nbclic = 0;
            }

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
                poly.setMap(map);


            }
        }



        function creaScore(data) {
            data.table = "score";
            $.get('c.php',
                data);
        }

        function creaPersonne(data) {
            data.table = "personne";
            $.get('c.php',
                data);
        }

        function rDocument(data) {
            data.table = "document";
            $.get('r.php',
                data);
        }

	</script>
  <br>
  <br>
  <br>
  </div>
  <br>
  
		<div id="map">
		</div>
		<div id="cord1">
		
		Distance entre saint Denis université et Paris <br>
		<input type="text" value="distance">
		
		</div>
		
		

    <script type="text/javascript">
	// identification login github 


//

function cal() {
		var lat = document.getElementById("lat").value;
		var lng = document.getElementById("lng").value;
		
		var point = new google.maps.LatLng(lat,lng);
		
	
		
		var paris8 = new google.maps.LatLng(48.945567, 2.363268);
		
		
		var distanceKm = google.maps.geometry.spherical.computeDistanceBetween(paris8, paris);
		
		var dis = (distanceKm / 1000);

		document.getElementById('val').innerHTML= "<font style='    font-size: xx-large;'>La distance = "+ dis.toFixed(2)+" Kilomètres </font>";	
	}
var map; 
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 48.945567, lng: 2.363268},
    zoom: 14
	
  });
    paris8 = new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: {lat: 48.945567, lng: 2.363268},
	title: 'paris8'
  });
  paris = new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: {lat: 48.945550, lng: 2.363261},
	title: 'paris'
  });
  
/////////////////////////////

var point = new GPoint(45.779915302498935, 4.803814888000488);  // Création du point correspondant aux coordonnées nous intéressant
var marker = new GMarker(point);  // Création d'un marqueur localisé sur ce point
map.addOverlay(marker);  // Et ajout du marqueur à la carte 
map.addOverlay(point); 
  
}


//info windows 

  


    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBY21s3i4xbxpdJy5pWU2rd7Oxe4ZHRbgw&callback=initMap">
    </script>
  </body>
</html>
