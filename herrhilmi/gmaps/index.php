<?php 
$apiGMap = "AIzaSyDRWApxqHrynQTocW6aK5Fb2R_vcLGEDVU";
?>
<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta charset="utf-8"/>
  <link rel="stylesheet" type="text/css" href="style.css"/>
  </head>
  <body>
	<div id="navbar">
		<h3 class="title" align=center>Devinette</h3>
	</div>
	<div id="container">
		<div id="left-menu">
			<h3 class="title-primary">But</h3>
			<p>le but est de deviner l'emplacement géographique d'un lieu, qui vous est proposé.</p>
			
			<h3 class="title-primary">Régles du jeu</h3>
			<ul  class="list-item-holder">
				<li class="list-item">Vous procéder par simple clic pour trouver le lieu caché.</li>
				<li class="list-item">Vous avez 5 essais.</li>
			</ul>
			<h3 class="title-primary">Question</h3>
			<p>Quel est le pays d'origine de Facebook ?</p>
			
		</div>
		<div id="myContent">
			<div id="map"></div>
			<div id="display">
				<p id="display-para"></p>
				<button  id="reset-btn"align=center class="btn" style="display:none" onClick='refresh()'>Réintialiser</button>
			</div>
		</div>
	</div>
	
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apiGMap;?>&libraries=geometry&callback=initMap">
	
	</script>
	<script src="script.js"></script>
    
  </body>
</html>