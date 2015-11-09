var map;
var markers = [];
var hiddenCoords = [];
var myCoordinates;
var hiddenArea;
var infoWindow;
var essais = 5;
var infoWindowVisible = false;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
	center: {lat: 40.416775, lng: -3.703790},
	zoom: 2
  });
  
  hiddenCoords =[new google.maps.LatLng(48.574790,-124.453125),
				new google.maps.LatLng(49.152970,-95.273438),
				new google.maps.LatLng(48.341646,-88.945313),
				new google.maps.LatLng(45.213004,-82.617188),
				new google.maps.LatLng(41.902277,-83.144531),
				new google.maps.LatLng(47.517201,-68.203125),
				new google.maps.LatLng(45.336702,-66.796875),
				new google.maps.LatLng(38.548165,-75.761719),
				new google.maps.LatLng(36.456636,-75.761719),
				new google.maps.LatLng(31.203405,-81.562500),
				new google.maps.LatLng(26.115986,-80.332031),
				new google.maps.LatLng(25.641526,-80.683594),
				new google.maps.LatLng(26.745610,-82.089844),
				new google.maps.LatLng(30.297018,-84.375000),
				new google.maps.LatLng(29.382175,-95.449219),
				new google.maps.LatLng(26.431228,-97.207031),
				new google.maps.LatLng(30.145127,-102.480469),
				new google.maps.LatLng(29.075375,-103.535156),
				new google.maps.LatLng(31.653381,-108.105469),
				new google.maps.LatLng(32.546813,-114.960938),
				new google.maps.LatLng(32.842674,-117.421875),
				new google.maps.LatLng(36.315125,-122.343750),
				new google.maps.LatLng(40.044438,-124.628906),
				new google.maps.LatLng(48.458352,-124.628906)
				];
				
  hiddenArea = new google.maps.Polygon({
    paths: hiddenCoords,
    strokeOpacity: 0.0,
    strokeWeight: 0,
    fillOpacity: 0.0
  });
  
  // center of CA to compute the distance
  myCoordinates = new google.maps.LatLng(38.134557,-120.585938);
  
  infoWindow = new google.maps.InfoWindow;
  map.addListener('click',addMarker);
  hiddenArea.addListener('click', success);
  infoWindow.addListener('closeclick', infoWindowClosed);
  
  hiddenArea.setMap(map);
}


function addMarker(event) {
	
	if(essais >1 && !infoWindowVisible)
	{
		var clicPosition = google.maps.geometry.poly.containsLocation(event.latLng, hiddenArea);
		
		if(clicPosition === true)
		{
			success(event);
		}
		else{
			var distance = google.maps.geometry.spherical.computeDistanceBetween(myCoordinates,event.latLng)/1000;			
			
			var marker = new google.maps.Marker({
			position: event.latLng,
			map: map
			});
		  
			if(markers.length >0) {
				markers[0].setMap(null);
			}
			
			markers[0] = marker;
			document.getElementById("display-para").innerHTML ="à " + distance.toFixed(2) + " KM près";
		
		}
		
		essais--;
	}
	else if(essais <=1)
	{
		// perdu
		document.getElementById("display-para").innerHTML ="Ooops! vous avez perdu.";
		document.getElementById("reset-btn").style.display ="block";
	}
  
}

function deleteMarkers() {
  markers[0].setMap(null);
  markers = [];
}

function success(event){
	if(essais >1 && !infoWindowVisible)
		{
		document.getElementById("display-para").innerHTML = "";
		// remove marker
		if(markers.length >0) {
				markers[0].setMap(null);
		}
		
		var contentString = '<b>Bravo</b><br>' +
		  'L\'origine de Facebook est<br>bel et bien les états-unis d\'amérique.<br>';
		  
		// Replace the info window's content and position.
		infoWindow.setContent(contentString);
		infoWindow.setPosition(event.latLng);

		infoWindowVisible = true;
		infoWindow.open(map);
	}
		
}

function infoWindowClosed(){
	infoWindowVisible = false;
	essais = 5;
}

function refresh(){
	document.getElementById("display-para").innerHTML = "";
	document.getElementById("reset-btn").style.display ="none";
	markers[0].setMap(null);
	infoWindow.close();
	essais = 5;
}

   