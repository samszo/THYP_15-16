<!DOCTYPE html>
<html>

<head>
    <title>Map Game</title>
    <script src="../js/jquery.min.js"></script>
    <meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="styles.css">
<style type="text/css">
  html,
body {
            height: 80%;
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;
            padding: 0;
        }
        
#map {
            height: 100%;
        }


</style>
</head>

<body>

    <center>
        <div>
            <h1 id="m" style="display:none">Trouver la ville où se trouve ce monument</h1>
      <img name="myimage" id="id1" src="doc1.png" width="60" height="60" alt="word" style="display:none" />
       

        </div>
    </center>
    <div id="map" style="display:none"></div>
    <br>
    <center>
        <div>
            <label id="resultat" style="display:none"></label>
        </div>
    </center>
    <br>
    <br>

    <div id="container" style="display:block">
    
    
    <label for="name">Username:</label>
    
    <input type="name" id="prenom">
    
    <input type="submit" onClick="affichage()" value="Se connecter">
    
  </div>


    <script type="text/javascript">
    
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
                    lat: 44.21371,
                    lng: -34.628906
                },
                zoom: 3,
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8iPdcMicCIEF556BHvhFLeVHxKR7Llgc&libraries=geometry&callback=initMap">
    </script>
</body>

</html>