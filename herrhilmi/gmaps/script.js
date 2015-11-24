var map;
var markers = [];
var hiddenCoords;
var myCoordinates;
var essais = 5;
var logged = false;
var member;
var list_documents;
var selected_doc = 0;
var distance;
function checkLogin(){
	if(logged ===false){
		hideElementById("main-content");
		showElementById("splash-content");
		hideElementById("logout");
		hideElementById("img-loading");
		hideElementById("login-failed");
		showElementById("login-box");
	}
	else
	{
		showElementById("main-content");
		hideElementById("splash-content");
		showElementById("logout");
		//charge les score de l'utilisateur
		loadScore(list_documents[selected_doc]["id_doc"]);			
	}
};


function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
	center: {lat: 40.416775, lng: -3.703790},
	zoom: 2
  });
  
				
  loadDocuments();
  // center of CA to compute the distance
  myCoordinates = new google.maps.LatLng(38.134557,-120.585938);

  map.addListener('click',addMarker);
}

function addMarker(event) {
	
	if(essais >1 )
	{
		distance = google.maps.geometry.spherical.computeDistanceBetween(hiddenCoords,event.latLng)/1000;			
			
		if(distance <700)
		{
			success(event);
		}
		else{
			
			var marker = new google.maps.Marker({
			position: event.latLng,
			map: map
			});
		  
			if(markers.length > 0) {
				markers[0].setMap(null);
			}
			
			markers[0] = marker;
			document.getElementById("display-para").innerHTML ="à " + distance.toFixed(3) + " KM près";
		
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
	if(essais >1)
		{
		document.getElementById("display-para").innerHTML = "Bravo! vous avez gagner.";
		// remove marker
		if(markers.length >0) {
				markers[0].setMap(null);
		}
		var a = JSON.parse(list_documents[selected_doc]);
		creaScore({"id_doc":a["id_doc"],"id_perso": member["id_perso"],"distance": distance});
		
		selected_doc = (selected_doc === 0) ? 1 : 0;
		onDocumentsLoaded();
		
		//$("#result").html("hihi");
	
	}
		
}

function refresh(){
	document.getElementById("display-para").innerHTML = "";
	hideElementById("reset-btn");
	markers[0].setMap(null);
	essais = 5;
	selected_doc = 0;
}

function creaScore(data){
	data.table = "score";
	$.get('../php/c.php', data,
        		function(html){
		
       		});	
}

function connect(){
	hideElementById("login-failed");
	showElementById("img-loading");
	var data ={"table":"connect"};
	var login = document.getElementById("login-github").value;
	
	if(login.length > 0 &&login.length <20){
		hideElementById("login-box");
		data.github = login;
		
		$.ajax({
		  url: '../php/r.php',
		  data: data,
		  success: function(html){
					onConnected(html);
       		},
		  error: function(xhr, ajaxOptions, thrownError){
					onLoginFailed();	
			}
		});
	}
	else
	{
		showElementById("login-failed");
		hideElementById("img-loading");
		document.getElementById("login-failed").innerHTML = "Saisie invalide";
	}
}

function onConnected(html){
	member = JSON.parse(html);
	logged = true;
	document.getElementById("logged-user").innerHTML = member["nom"];
	checkLogin();	
}

function onLoginFailed(){
	hideElementById("img-loading");
	document.getElementById("login-failed").innerHTML = "Login github introuvable";
	showElementById("login-box");
	showElementById("login-failed");	
}

function logout(){
	logged = false;
	checkLogin();
}

function loadDocuments()
{
	var data = {"table":"document"};
	$.ajax({
		  url: '../php/r.php',
		  data: data,
		  success: function(html){
				list_documents = JSON.parse(html);
				onDocumentsLoaded();
       		}
		});
}

function onDocumentsLoaded()
{
	var a = list_documents[selected_doc];
	document.getElementById("question").innerHTML = a.nom;
	// load coords
	hiddenCoords = new google.maps.LatLng(+a["lat"],+a["lng"]);
	
	icon = new Image();
	icon.src = a["url"];
	document.imgquestion.src=eval("icon.src");
	essais = 5;
	
}

function loadScore(id_doc)
{
	var data = {"table":"score","id_perso": member["id_perso"], "id_doc":id_doc};
	$.ajax({
		  url: '../php/r.php',
		  data: data,
		  success: function(html){
				score = JSON.parse(html);
				onScoreLoaded(score);
       		}
		});
}

function onScoreLoaded(score){
	var col = "<td>"+score["id_doc"]+"</td><td>"+score.distance+"</td><td>"+score.maj+"</td>";
	
	$("<tr></tr>").html(col).appendTo("#scores");
}
function showElementById(attr) {
	document.getElementById(attr).style.display = "block";
}

function hideElementById(attr) {
	document.getElementById(attr).style.display = "none";
}