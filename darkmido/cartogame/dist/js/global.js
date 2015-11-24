var nom;
var map;
var allDocuments;
var actualDocument;
var actualPersonne;
var allPersonne;
var chances = 5;

var myStyle = [
{
 elementType: "labels",
 stylers: [
 { visibility: "off" }
 ]
}
];

function createPersonne(nom){
	$.get('c.php',{'table' : 'personne', 'nom' : nom},function(){
    loadPersonne(nom, function(val){
      actualPersonne = JSON.parse(val);
      console.log(nom);
      //afficher la personne dans l'html
      document.getElementById('personName').innerHTML = actualPersonne[0].nom;
    });
  });	
}

function createScore(id_perso, id_doc, distance){
  console.log(id_perso + " " + id_doc + " " + distance)
  $.get('c.php',{'table' : 'score', 'id_perso' : id_perso, 'id_doc' : id_doc, 'distance' : distance},function(){
  }); 
}

function showPersonne(p){

}

function showDocument(){
  chances = 5;
  document.getElementById('chances').innerHTML =chances;
  shuffle(allDocuments); 
  actualDocument = allDocuments[0];
  allDocuments.shift();
  initMap(actualDocument.lat,actualDocument.lng);
  document.getElementById('monument').src = 'img/'+actualDocument.url+'.jpg';
  document.getElementById('monumentName').innerHTML =actualDocument.nom;
}

function loadDocuments(callback) { 
  $.get('r.php',{'table' : 'document'}, callback);
}

function loadPersonne(nom,callback) { 
  $.get('r.php',{'table' : 'personne','nom' : nom}, callback);
}

function loadAllPersonne(callback) { 
  $.get('../r.php',{'table' : 'personnes'}, callback);
}

function jouer(){

  nom = document.getElementById('joueur').value;
  

  if(!nom.trim() || nom.length === 0){
    $("#danger").html('Entrez un nom correcte !').removeClass("hidden").hide().fadeIn("slow");
  }

  else{
    nom = nom.toLowerCase();
    createPersonne(nom);

    document.getElementById('divJouer').style.display = 'none';
    document.getElementById('divCarte').style.display = 'block';
    document.getElementById('personne').style.display = 'block';
    document.getElementById('chances').innerHTML =chances;


    //charger les documents et choisir un au hasard
    loadDocuments(function(val){
      allDocuments = JSON.parse(val);
      showDocument();
    });
  }
}

function initMap(latt,lngg) {
  var geocoder = new google.maps.Geocoder();
  var location = "Paris";
  geocoder.geocode( { 'address': location }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
    } else {
      alert("Could not find location: " + location);
    }
  });
  
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    mapTypeControlOptions: {
     mapTypeIds: ['mystyle', google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.TERRAIN]
   },
   mapTypeId: 'mystyle'
 }); 

  map.mapTypes.set('mystyle', new google.maps.StyledMapType(myStyle, { name: 'My Style' }));


  

  google.maps.event.addListener(map, "click", function(event) {
    var lat = event.latLng.lat();
    var lng = event.latLng.lng();
    var win = false;
    //console.log("Lat=" + lat + "; Lng=" + lng);

    var R = 6378137; // Earth’s mean radius in meter
    var dLat = rad(latt - lat);
    var dLong = rad(lngg - lng);
    var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(rad(lat)) * Math.cos(rad(latt)) *
    Math.sin(dLong / 2) * Math.sin(dLong / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var d = Math.round(R * c);

    if(d>100){
      document.getElementById("cible").innerHTML= d + " mètres de la cible";
      document.getElementById("cible").style.color = "red";
    }
    else{
      document.getElementById("cible").innerHTML="";
      win = true;
    }
    createScore(actualPersonne[0].id_perso,actualDocument.id_doc,d);
    chances--;
    if(chances>=0)
      document.getElementById('chances').innerHTML =chances;

    if(chances==0 || win){
      document.getElementById("cible").innerHTML="";
      if(allDocuments.length >0){
        showDocument();
      }
      else{
        //Game Over
        gameOver();
      }
    }

  });

}

function gameOver() {
  document.getElementById('divCarte').style.display = 'none';
  document.getElementById('divGameover').style.display = 'block';
}

// Grid for Personnes
function personnes(){
  loadAllPersonne(function(val){
    allPersonne = JSON.parse(val);
    personneGrid(allPersonne);
  });
}

function personneGrid(pers){
  var tabdocuments = [];
  pers.forEach(function(s){
        tabdocuments.push({ recid: s["id_perso"], text: s["nom"]})
      });

  $('#grid').w2grid({ 
        name: 'grid', 
        show: { 
            toolbar: true,
            footer: true,
            toolbarSave: true
        },
        columns: [                
            { field: 'recid', caption: 'id_perso', size: '50px', sortable: true, resizable: true },
            { field: 'text', caption: 'nom', size: '120px', sortable: true, resizable: true, 
                editable: { type: 'text' }
            },
        ],
        toolbar: {
            items: [
                { id: 'add', type: 'button', caption: 'Add Record', icon: 'w2ui-icon-plus' }
            ],
            onClick: function (event) {
                if (event.target == 'add') {
                    w2ui.grid.add({ recid: w2ui.grid.records.length + 1 });
                }
            }
        },
        records: tabdocuments
    });
}

var rad = function(x) {
  return x * Math.PI / 180;
}

function shuffle(o){
  for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
}

