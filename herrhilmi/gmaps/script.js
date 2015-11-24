var map;
var markers = [];
var hiddenCoords;
var myCoordinates;
var essais = 5;
var logged = false;
var member;
var list_documents = [];
var scores = [];
var selected_doc = 0;
var distance;

/* refresh page display
**/
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
		initMap();
		//charge les score de l'utilisateur
		//loadScore(list_documents[selected_doc]["id_doc"]);			
	}
}


/* init Maps and load all documents
**/
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
	center: {lat: 40.416775, lng: -3.703790},
	zoom: 2,
	mapTypeControl: false,
	streetViewControl: false,
	rotateControl: false
  });
  
  // center of CA to compute the distance
  myCoordinates = new google.maps.LatLng(38.134557,-120.585938);

  map.addListener('click',addMarker);
}

/* add a Marker on the Map after interation
* compute the distance from document coords
* check whether the user has won or not
**/
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

/* delete the last drawed marker
**/
function deleteMarkers() {
	markers[0].setMap(null);
	markers = [];
}

/* user has won, add a new score 
* prepare the next document
**/
function success(event){
	if(essais >1)
		{
		document.getElementById("display-para").innerHTML = "Bravo! vous avez gagner.";
		// remove marker
		if(markers.length >0) {
				markers[0].setMap(null);
		}
		var a = list_documents[selected_doc];
		var data = {"id_doc": a["id_doc"], "id_perso": member["id_perso"], "distance": distance};
		creaScore(data);
		
		selected_doc = (selected_doc < (list_documents.length - 1)) ? (selected_doc + 1) : 0;
		onDocumentsLoaded();
	}
		
}

/* refresh user login's area
* used for form validation
**/
function refresh(){
	document.getElementById("display-para").innerHTML = "";
	hideElementById("reset-btn");
	markers[0].setMap(null);
	essais = 5;
	selected_doc = 0;
}

/* send an ajax request with a new score 
* handle if it's an update/insert request
**/
function creaScore(data){
	data.table = "score";
	var id_score;
	// lookup wheter it's an update/insert Request
	if(scores !== undefined){
		scores.forEach(function(score){
			//update request
			if(score['id_perso'] === data['id_perso'] && score['id_doc'] === data['id_doc'])
			{
				id_score = score['id_scores'];
			}
		
		});
	
	}
	
	//update
	if(id_score !== undefined)
	{
		data['id_score'] = id_score;
		$.get('../php/u.php', data, function(html){
			loadScore(data['id_doc'], false);
		});	
		
	}
	else
	{
		// insert
		$.get('../php/c.php', data
		, function(html){
			// get id of the inserted score
			loadScore(data['id_doc'], true);
		});	
		
	}
}

/* authentification function
**/
function connect(){
	hideElementById("login-failed");
	showElementById("img-loading");
	var data ={"table":"connect"};
	var login = document.getElementById("login-github").value;
	
	if(login.length > 0 && login.length <20){
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
		hideElementById("img-loading");
		showElementById("login-failed");
		document.getElementById("login-failed").innerHTML = "Saisie invalide";
	}
}

/* successful login callback
**/
function onConnected(json)
{
	member = JSON.parse(json);
	logged = true;
	document.getElementById("logged-user").innerHTML = member["nom"];
	checkLogin();	
	loadDocuments();
}

/* failed login callback
**/
function onLoginFailed()
{
	hideElementById("img-loading");
	showElementById("login-box");
	document.getElementById("login-failed").innerHTML = "Login github introuvable";
	showElementById("login-failed");	
}

/* logout function
**/
function logout()
{
	logged = false;
	checkLogin();
}

/* an ajax request to load all documents 
**/
function loadDocuments()
{
	var data = {"table":"document"};
	$.ajax({
		  url: '../php/r.php',
		  data: data,
		  success: function(html){
				list_documents = JSON.parse(html);
				onDocumentsLoaded();
				loadAllScores();
       		}
		});
}


/* documents successfuly loaded callback
**/
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

/* AJAX request to load all scores for a specific user
**/
function loadAllScores()
{
	var data = {"table":"scores","id_perso": member["id_perso"]};
	$.ajax({
		  url: '../php/r.php',
		  data: data,
		  success: function(html){
				onScoresLoaded(html);
       		}
		});
}

/* scores successfuly loaded callback
**/
function onScoresLoaded(html)
{
	if(html.length >0)
	{
		scores = JSON.parse(html);
		scores.forEach(function(score){
				var col = "<td>"+score["id_doc"]+"</td><td>"+score.distance+"</td><td>"+score.maj+"</td>";
				$("<tr id=\"score_"+score['id_scores']+"\"></tr>").html(col).appendTo("#scores");
			});
	}
	
}

/* AJAX request to load score for a specific document
**/
function loadScore(id_doc, create_new_row)
{
	var data = {"table":"score","id_perso": member["id_perso"], "id_doc":id_doc};
	$.ajax({
		  url: '../php/r.php',
		  data: data,
		  success: function(html){
				score = JSON.parse(html);
				updateScoreTable(score, create_new_row);
				}
		});
}

/* update scores table 
**/
function updateScoreTable(score , create_new_row)
{
	var col = "<td>"+score["id_doc"]+"</td><td>"+score.distance+"</td><td>"+score.maj+"</td>";
	
	if(create_new_row)
	{
		$("<tr id=\"score_"+score['id_scores']+"\"></tr>").html(col).appendTo("#scores");
		// pusg a new score
		scores.push(score);
	}
	else
	{
		$('#score_'+score['id_scores']).html(col).appendTo("#scores");
		// update local scores
		scores.forEach(function(d){
			if(d['id_perso'] === score['id_perso'] && d['id_doc'] === score['id_doc'])
			{
				d = score;
			}
		
		});
	}
	
}



/* show an element given its Id
**/
function showElementById(attr) 
{
	document.getElementById(attr).style.display = "block";
}

/* hide an element given its Id
**/
function hideElementById(attr)
 {
	document.getElementById(attr).style.display = "none";
}