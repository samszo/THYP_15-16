<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Jeux avec api Google map</title>
    <script src="../../js/jquery.min.js" ></script>
</head>
<body>

<h1 id="h1-header"> Mini-game with google map</h1>

<div id="map">


</div>
<div class="question">
    <p> Où se trouve <b id="place">Triangle des bermudes</b> ?</p>
</div>
<div  id="indice">
    <p> Votre se trouve a <b id="distance"></b>km de la solution </p>
</div>

<div>


</div>
<script type="text/javascript">
    var map;
    var triangleCoords ;

    var arraysite = [];

    


    var carreParis ;
    var carreOran ;
    var distance; 
    var resultColor = "red";
    var firstClick = true;
    var places = ["Triangle des bermudes"];
    var tableauCoords;
    var i = 0;
    var coords = null;
    var coordsForDistance;
    var Sites;
    function win() {
        i++;
        if (i >= places.length) {
            i = 0;
        }
        coords = new google.maps.Polygon({paths: tableauCoords[places[i]]});
        coordsForDistance =  tableauCoords[places[i]][0];
        alert("Bravo ! vous avez trouvé ");
        document.getElementById("place").innerHTML = places[i];
        document.getElementById("indice").style.display = "none";
        creaScore({"id_doc":2,"id_perso":2,"distance":0});
       
        resultColor = "green";
    }
    function initMap() {
        
        getSites({"table":"document"});


        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 24.886, lng: -70.269},
            zoom: 2,
        });
        
        
        

        carreOran = [
            new google.maps.LatLng(35.713068, -0.694885),
            new google.maps.LatLng(35.653391, -0.688705),
            new google.maps.LatLng(35.665107, -0.545883),
            new google.maps.LatLng(35.770472, -0.564423),
            new google.maps.LatLng(35.717528, -0.692825)
        ];
        carreParis = [
            new google.maps.LatLng(48.844384,2.250824),
            new google.maps.LatLng(48.901741,2.308502),
            new google.maps.LatLng(48.904449,2.398453),
            new google.maps.LatLng(48.835345,2.416992),
            new google.maps.LatLng(48.812742,2.359314),
            new google.maps.LatLng(48.833086,2.254257),
            new google.maps.LatLng(48.843932,2.248764)
        ];
        

        arraysite["Triangle des bermudes"] = [
        new google.maps.LatLng(25.918526,-80.419922),
        new google.maps.LatLng(32.509762,-64.995117),
        new google.maps.LatLng(18.354526,-66.093750),
        new google.maps.LatLng(26.037042,-80.463867)
        ];
        
        tableauCoords = arraysite ;
        coords = new google.maps.Polygon({paths: tableauCoords[places[0]]});
        coordsForDistance =  tableauCoords[places[0]][0];
        map.addListener('click', function (e) {
      
            if (google.maps.geometry.poly.containsLocation(e.latLng, coords)) {
                
                win();
            }
            else {
                distance = google.maps.geometry.spherical.computeDistanceBetween(coordsForDistance,e.latLng)/1000;
                alert("vous vous êtes trompé ! réessayer ");
                document.getElementById("indice").style.display = "block";
                document.getElementById("distance").innerHTML = distance.toFixed(2);
                resultColor = "red";
                creaScore({"id_doc":2,"id_perso":2,"distance":distance}); 
               
            }
            if(firstClick)
            {
                    Marker = new google.maps.Marker({
                     position: e.latLng,
                     map: map,
                     icon: {
                     path: google.maps.SymbolPath.CIRCLE,
                     fillColor: resultColor,
                     fillOpacity: .6,
                     strokeColor: 'white',
                     strokeWeight: .5,
                     scale: 10
                     }
                     });
                      firstClick = false;
            }
            else
            {
                Marker.setPosition(e.latLng);
            }
        });
    }
    /*
     }*/
function creaScore(data){
    data.table = "score";
    $.get('../php/c.php',
            data,
                function(html){
                $("#result").html(html);
            }); 
}


function getSites(data){
    
    data.table = "document";
    $.get('../php/c.php',
            data,
                function(html){
                Sites = JSON.parse(html);
                Sites.forEach(function(s){
                    getCoords(s['id_doc'],s['nom']);
                })
            }); 
  }


function getCoords(id,site){

    var arraycoords = [];
    var data = {table:"coords",idDoc:id};

    console.log(id);
    $.get('../php/c.php',
            data,
                function(html){

                    
                Coords = JSON.parse(html);
                Coords.forEach(function(s){
                        
                 arraycoords.push(new google.maps.LatLng(s.latitude, s.longitude)); 

                })
                arraysite[site]= arraycoords;
                places.push(site);
                console.log(places);
            }); 
  }

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAL0C5xB_p1v50yImLbXLm-fi-Q11ELASI&callback=initMap">
</script>
</body>
    <style type="text/css">
        html, body, p {
            height: 100%;
            margin: 0;
            padding: 0;
            font-weight: 100;
            font-family: helvetica;
        }
        #map {
            height: 400px;
            width: 600px;
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
            height: 43px;
            font-size: 29px;
            font-weight: 100;
            line-height: 47px;
        }
        #indice {
            display: none;
            text-align: center;
            font-weight: 100;
            background-color: #0044CC;
            color: white;
            height: 43px;
            font-size: 29px;
            font-weight: 100;
            line-height: 47px;
            margin: 2px 0px;
        }
        }
    </style>
</html>