<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      
	  #titre{
		 padding-left:600px;
	     background-color : #4BB5C1;		 
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
		  width:745px;
		  margin-left:680px;
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
<h2>KRAYEM Mabrouka</h2>  
  </div>
  <div id="aa">
		<div id="map">
		</div>
		<div id="cord1">
		cord1
		</div>
		<div id="cord2">
		cord2
		</div>
		
	</div>
    <script type="text/javascript">

var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 16
  });
}

var marker;

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 16,
    center: {lat: -34.397, lng: 150.644}
  });

  marker = new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: {lat: -34.397, lng: 150.644}
  });
  marker.addListener('click', toggleBounce);
}

function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
//info windows 
function initMap() {
  var uluru = {lat: -34.397, lng: 150.644};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: uluru
  });

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">info windows cart </h1>'+
      '<div id="bodyContent">'+
      '<p><b>Uluru</b>, cccc</b>, is a large ' +
      'cccc '+
      'ccc '+
      'cccc'+
      'Heritage Site.</p>'+
      '<p> merci pour le document tutoriel , <a href="https://developers.google.com/maps/documentation/javascript/infowindows">'+
      'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
      'crée le vendredi 06/11/2015</p>'+
      '</div>'+
      '</div>';
	  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });

  var marker = new google.maps.Marker({
    position: uluru,
    map: map,
    title: 'Uluru (Ayers Rock)'
  });
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });
}
function setup() {
  var e = document.getElementById("watchme");
  e.addEventListener("animationstart", listener, false);
  e.addEventListener("animationend", listener, false);
  e.addEventListener("animationiteration", listener, false);
  
  var e = document.getElementById("watchme");
  e.className = "slidein";
}
    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBY21s3i4xbxpdJy5pWU2rd7Oxe4ZHRbgw&callback=initMap">
    </script>
  </body>
</html>