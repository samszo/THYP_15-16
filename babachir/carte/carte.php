<?php

session_start();

if (!isset($_SESSION['nom'])) {
    header('Location: index.php');
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Jeux avec api Google map</title>
    <script src="../../js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://w2ui.com/src/w2ui-1.4.2.min.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://w2ui.com/src/w2ui-1.4.2.min.js"></script>
</head>
<body>

<h1 id="h1-header"> Mini-game with google map <a href="admin.php"> Admin</a> <a href="../php/deconnect.php"> Deconnexion</a></h1>

<div id="map">


</div>
<div class="question">
    <div>
        <p> Où se trouve <b id="place">Triangle des bermudes</b> ?</p>

        <img id="imgQuestion" src="http://www.paranormal-info.fr/images/la-malediction-du-triangle-des-bermudes.jpg"
             width="100" height="100">
    </div>
</div>
<div id="indice">
    <p> Votre se trouve a <b id="distance"></b>km de la solution </p>
</div>

<div>


</div>

<div id="grid" style="    width: 396px;
    height: 403px;
    margin: 12px 65px;"></div>
<script type="text/javascript">
    var map;
    var triangleCoords;

    var arraysite = [];
    var urlImage = [];
    urlImage["Triangle des bermudes"] = "http://www.paranormal-info.fr/images/la-malediction-du-triangle-des-bermudes.jpg";


<<<<<<< HEAD
    var distance;
    var resultColor = "red";
    var firstClick = true;
    var places = ["Triangle des bermudes"];
=======
    /*var carreOran = [
        {lat: 48.827, lng: 2.24},
        {lat: 48.813, lng: 2.412},
        {lat: 48.899, lng: 2.429},
        {lat: 48.897, lng: 2.265}
    ];*/
>>>>>>> a5114af7b9822ee46672a94dbb12f6720fda9ee3


    var i = 0;
    var coords = null;
    var coordsForDistance;
    var Sites;

    getScore();
    function win() {
        i++;
        if (i >= places.length) {
            i = 0;
        }
        coords = new google.maps.Polygon({paths: arraysite[places[i]]});
        coordsForDistance = arraysite[places[i]][0];
        alert("Bravo ! vous avez trouvé ");
        document.getElementById("place").innerHTML = places[i];
        document.getElementById("imgQuestion").src = urlImage[places[i]];
        document.getElementById("indice").style.display = "none";
        creaScore({"id_doc": 2, "id_perso": 2, "distance": 0});

        resultColor = "green";
    }
    function initMap() {

        getSites({"table": "document"});


        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 24.886, lng: -70.269},
            zoom: 2,
        });


        arraysite["Triangle des bermudes"] = [
            new google.maps.LatLng(25.918526, -80.419922),
            new google.maps.LatLng(32.509762, -64.995117),
            new google.maps.LatLng(18.354526, -66.093750),
            new google.maps.LatLng(26.037042, -80.463867)
        ];


        coords = new google.maps.Polygon({paths: arraysite[places[0]]});
        coordsForDistance = arraysite[places[0]][0];
        map.addListener('click', function (e) {

            if (google.maps.geometry.poly.containsLocation(e.latLng, coords)) {

                win();
            }
            else {
                distance = google.maps.geometry.spherical.computeDistanceBetween(coordsForDistance, e.latLng) / 1000;
                alert("vous vous êtes trompé ! réessayer ");
                document.getElementById("indice").style.display = "block";
                document.getElementById("distance").innerHTML = distance.toFixed(2);
                resultColor = "red";
                creaScore({"id_doc": 2, "id_perso": 2, "distance": distance});

            }
            if (firstClick) {
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
            else {
                Marker.setPosition(e.latLng);
            }
        });
    }
    /*
     }*/
    function creaScore(data) {
        data.table = "score";
        $.get('../php/c.php',
            data,
            function (html) {
                $("#result").html(html);
            });
    }


    function getSites(data) {

        data.table = "document";
        $.get('../php/c.php',
            data,
            function (html) {
                Sites = JSON.parse(html);
                Sites.forEach(function (s) {
                    getCoords(s['id_doc'], s['nom']);
                    urlImage[s['nom']] = s['url'];

                })

            });
    }


    function getScore() {
        var array = [];
        var data = {'table': "getscore"};
        $.get('../php/c.php',
            data,
            function (html) {
                score = JSON.parse(html);

                score.forEach(function (s) {

                    array.push({recid: 1, fname: s['nom'], score: s['distance']});

                })

                $(function () {
                    $('#grid').w2grid({
                        name: 'grid',
                        columns: [
                            {
                                field: 'fname', caption: 'Name', size: '300px',
                                render: function (record, index, column_index) {
                                    var html = '<div>' + record.fname;
                                    return html;
                                }
                            },
                            {field: 'score', caption: 'Score', size: '50%'},

                        ],
                        records: array
                    });
                });
            })
    }


    function getCoords(id, site) {

        var arraycoords = [];
        var data = {table: "coords", idDoc: id};

        $.get('../php/c.php',
            data,
            function (html) {


                Coords = JSON.parse(html);
                Coords.forEach(function (s) {

                    arraycoords.push(new google.maps.LatLng(s.latitude, s.longitude));

                })
                arraysite[site] = arraycoords;
                places.push(site);

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
        height: 102px;
        font-size: 29px;
        font-weight: 100;
        line-height: 47px;
    }

    .question p {
        display: block;
        height: 125px;
        float: left;
        width: 300px;
        margin-left: 600px;
        margin-right: -455px;
    }

    .question img {
        display: left;
    }

    #indice {
        clear: both;
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