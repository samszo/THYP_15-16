<!DOCTYPE html>
<?php
	include key.php;
?>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" src="key_google.js"></script>
    <style type="text/css">
		#container{
			height:100px;
			width:100px;
		}
      #map { 
		width: 100%;
        height: 100%;
		}
    </style>
  </head>
  <body>
	<div id="container">
		<div id="map"></div>
	</div>
    <script type="text/javascript">

		var map;
		function initMap() {
		  map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -34.397, lng: 150.644},
			zoom: 8
		  });
		}


    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key="<?php echo $keyGMap; ?>"&callback=initMap">
    </script>
  </body>
</html>