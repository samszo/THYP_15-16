<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Jeux avec api Google map</title>
    <style type="text/css">
        html, body, p {
            height: 100%;
            margin: 0;
            padding: 0;
            font-weight: 100;
            font-family: helvetica;
        }

        #map {
            height: 500px;
            width: 800px;
            margin: 30px auto;
        }

        #h1-header {
            text-align: center;
            font-weight: 100;
            font-size: 26px;
            background-color: #4285f4;
            margin-top: 0px;
            color: white;
            height: 60px;
            line-height: 52px;
        }

        .question {
            text-align: center;
            font-weight: 100;
            background-color: #0044CC;
            color: white;
            height: 100px;
            font-size: 29px;
            font-weight: 100;
            line-height: 92px;
        }

        }
    </style>
</head>
<body>

<h1 id="h1-header"> Mini-game with google map</h1>

<div id="map">


</div>
<div class="question">
    <p> Où se trouve <b id="place">Triangle des bermudes</b> ?</p>
</div>
<script type="text/javascript">
    var map;


    var triangleCoords = [
        {lat: 25.774, lng: -80.19},
        {lat: 18.466, lng: -66.118},
        {lat: 32.321, lng: -64.757}
    ];

    var carreParis = [
        {lat: 48.827, lng: 2.24},
        {lat: 48.813, lng: 2.412},
        {lat: 48.899, lng: 2.429},
        {lat: 48.897, lng: 2.265}
    ];

    /*var carreOran = [
        {lat: 48.827, lng: 2.24},
        {lat: 48.813, lng: 2.412},
        {lat: 48.899, lng: 2.429},
        {lat: 48.897, lng: 2.265}
    ];*/


    var places = ["Triangle des bermudes", "Paris", "Oran"];
    var tableauCoords;
    var i = 0;
    var coords = null;


    function win() {
        i++;
        if (i >= places.length) {
            i = 0;

        }
        coords = new google.maps.Polygon({paths: tableauCoords[places[i]]});

        alert("Bravo ! vous avez trouvé ");
        document.getElementById("place").innerHTML = places[i];
    }


    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 24.886, lng: -70.269},
            zoom: 5,
        });


        carreOran = [
            new google.maps.LatLng(35.713068, -0.694885),
            new google.maps.LatLng(35.653391, -0.688705),
            new google.maps.LatLng(35.665107, -0.545883),
            new google.maps.LatLng(35.770472, -0.564423),
            new google.maps.LatLng(35.717528, -0.692825)
        ];


        tableauCoords = {"Triangle des bermudes": triangleCoords, "Paris": carreParis, "Oran": carreOran};


        coords = new google.maps.Polygon({paths: tableauCoords[places[0]]});

        map.addListener('click', function (e) {


            if (google.maps.geometry.poly.containsLocation(e.latLng, coords)) {
                var resultColor = "green";
                win();
            }
            else {
                alert("vous vous êtes trompé ! réessayer ");
                var resultColor = "red";
            }

        });
    }
    /*
     new google.maps.Marker({
     position: e.latLng,
     map: map,
     icon: {
     path: google.maps.SymbolPath.CIRCLE,
     fillColor: resultColor,
     fillOpacity: .2,
     strokeColor: 'white',
     strokeWeight: .5,
     scale: 10
     }
     });


     }*/

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAL0C5xB_p1v50yImLbXLm-fi-Q11ELASI&callback=initMap">
</script>
</body>
</html>