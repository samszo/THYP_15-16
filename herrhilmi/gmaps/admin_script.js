var map;
var markers = [];
var position;
var people= [];
var scores= [];


	
/* init Maps and load all documents
**/
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
	center: {lat: 40.416775, lng: -3.703790},
	zoom: 5
  });
  
  // center of CA to compute the distance
  myCoordinates = new google.maps.LatLng(38.134557,-120.585938);

  map.addListener('click',addMarker);
  
 
  populateGridPersonnes();
  populateGridDocuments();
  populateGridScores();
}

/* add a Marker on the Map 
**/
function addMarker(event) 
{
	var marker = new google.maps.Marker({
	position: event.latLng,
	map: map
	});
  
	if(markers.length > 0) {
		markers[0].setMap(null);
	}
	
	markers[0] = marker;
	position = marker.getPosition();
	document.getElementById("latlng_document").value = "POINT("+position.lat()+" "+position.lng()+")";
}

function insertDocument()
{
	var data = {"table":"document"};
	
	var nom = document.getElementById("nom_document").value;
	var latlng =  "ST_GeomFromText('POINT("+position.lat()+"  "+position.lng()+")')";
	var url = document.getElementById("url_document").value;
	
	if(nom.length >0 && latlng.length >0 && url.length >0)
	{
		data.nom = nom;
		data.latlng = latlng;
		data.url = url;

		$.ajax({
		  url: '../php/c.php',
		  data: data,
		  success: function(html){
				document.getElementById("nom_document").value = " ";
				document.getElementById("latlng_document").value = " ";
				document.getElementById("url_document").value = " ";
		
				notify("log_document","Document ajouté");	
       		},
		  error: function(xhr, ajaxOptions, thrownError){
				notify("log_document","Erreur serveur impossible d'ajouté ce document");	
			}
		});
	}
	else
	{
		notify("log_document","Saisissez tous les champs s.v.p");
	}

}


function savePersonnes(changes)
{
	var data = {"data": changes, "table" : "personnesw2ui"};
	
	$.ajax({
	  type: "POST",
	  url: '../php/u.php',
	  data: data,
	  success: function(html){
			w2ui.grid.reload();	
		}
	});

}

function populateGridPersonnes()
{
	$('#grid').w2grid({ 
		name: 'grid',
		url : {
				get    : '../php/r.php?table=personnesw2ui',
				remove : '../php/d.php?table=personnesw2ui',
			},
		show: { 
			toolbar: true,
			footer: true,
			toolbarDelete: true,
			toolbarSave: true
		},
		columns: [                
			{ field: 'recid', caption: 'ID', size: '10%', sortable: true, resizable: true },
			{ field: 'text', caption: 'Login Github', size: '90%', sortable: true, resizable: true, 
				editable: { type: 'text' }
			}],
		onSave: {
		function(event){
			
		}
		}
		});  
	w2ui.grid.on('*', function (target, eventData) {
	   if(target ==="w2ui-save"){
		if(w2ui.grid.getChanges().length > 0){
			savePersonnes(w2ui.grid.getChanges());
		}
	   }
	});
}

function populateGridDocuments()
{	
	$('#griddocument').w2grid({ 
		name: 'griddocument', 
		url : {
			get : '../php/r.php?table=documentsw2ui',
			remove : '../php/d.php?table=documentsw2ui'
		},
		show: { 
			toolbar: true,
			footer: true,
			toolbarDelete : true,
			toolbarSave: true
		},
		columns: [                
			{ field: 'recid', caption: 'ID Document', size: '20%', sortable: true, resizable: true },
			{ field: 'text', caption: 'nom', size: '30%', sortable: true, resizable: true},
			{ field: 'position', caption: 'position', size: '30%', sortable: true, resizable: true},
			{ field: 'url', caption: 'link', size: '20%', sortable: true, resizable: true}
			]
	});    
	
}

function populateGridScores()
{	
	$('#gridscores').w2grid({ 
		name: 'gridscores', 
		url : {
			get    : '../php/r.php?table=scoresw2ui',
			remove : '../php/d.php?table=scoresw2ui'
		},
		show: { 
			toolbar: true,
			footer: true,
			toolbarDelete: true
		},
		columns: [                
			{ field: 'recid', caption: 'ID Score', size: '20%', sortable: true, resizable: true },
			{ field: 'text', caption: 'Login Github', size: '20%', sortable: true, resizable: true, editable: false},
			{ field: 'document', caption: 'Document', size: '20%', sortable: true, resizable: true, editable: false},
			{ field: 'distance', caption: 'Distance', size: '20%', sortable: true, resizable: true, editable: false},
			{ field: 'time', caption: 'Date', size: '20%', sortable: true, resizable: true, editable: false}
			]
	});    
}

/* display and auto hide msgs errors 
**/
function notify(attr, msg)
{
	showElementById(attr);
	document.getElementById(attr).innerHTML = msg;
	// hide log after 3 sec
	setTimeout(function(){
		hideElementById(attr);
	}, 3000);
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