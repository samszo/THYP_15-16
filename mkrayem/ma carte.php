<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      
	  #titre{
		 padding-left:600px;
<<<<<<< HEAD
	     background-color : #4BB5C1;		 
=======
		 padding-top: 0px;
	background-color : #4BB5C1;		 
>>>>>>> origin/master
	  }
	  h1{
		  padding-left:50px;
		  animation-duration: 3s;
		  animation-name: slidein;
		  animation-iteration-count: infinite;
			  }
	  #aa{
		  width:100%;
	  }
	    #map {
		float:left;
        height : 600px; /* IMPERATIF */
        width :650px;
		border:2px solid black;
		
      }
	  #cord1{
		  width:560px;
		  margin-left:680px;
		  margin-top:10px;
		  height:300px;
		  border:2px solid black;
			  }
	    #cord2{
		  width:745px;
		  padding-top:5px;
		  margin-top:5px;
		  margin-left:680px;
		  height:280px;
		  border:2px solid black;
			  }
    </style>
  </head>
  <body onLoad="setup()">
  <div id="titre"><h1 id="watchme">Ma carte</h1>
  <img src="avion.gif">
  <img src="v4.gif">
  </div>
  <div id="aa">
		<div id="map">
		</div>
		<div id="cord1">
		Distance entre saint Denis université et Paris <br>
		<input type="text" value="distance">
		
		</div>
		
		
	</div>
    <script type="text/javascript">

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

  
  
}
//info windows 

  


    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBY21s3i4xbxpdJy5pWU2rd7Oxe4ZHRbgw&callback=initMap">
    </script>
  </body>
</html>