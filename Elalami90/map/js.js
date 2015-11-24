
var joueur;
var id;
var listdocuments;
var geocoder;
var country;
var pays;
var marker;
var current = 0;
var chartBase = 'https://chart.googleapis.com/chart?chst=';


function creerpersonne(){

		var nompersonne = document.getElementById("clogin").value;
	

		creaPers({"nom":nompersonne});

}
function creaPers(data){

		data.table = "personne";

		$.get('php/c.php',
				data,
	        		function(html){
	        			
	        			alert('Compte bien Créé');
						
	       		});	
}

function login(){
	
	var username = document.getElementById("username").value;
	var data ={"table":"login"};
		data.username = username;
		
		$.ajax({
		  url: 'php/r.php',
		  data: data,
		  success: function(html){
					joueur = JSON.parse(html);
					  
					location.href="game.html?id="+joueur["id_perso"];
            
            
            
			
       		},
		  error: function(xhr, ajaxOptions, thrownError){
					
          alert("Personne introuvable ! Creez un compte.")
					
					
			}
		});
	
}

///////////////////////////////////////////////////////////////////////////////////////////////

 //  

/////////////////////////////////////////////////////////////////////////////////////////////////
 
      function getCountry(results) {
         var geocoderAddressComponent,addressComponentTypes,address;
         for (var i in results) {
           geocoderAddressComponent = results[i].address_components;
           for (var j in geocoderAddressComponent) {
             address = geocoderAddressComponent[j];
             addressComponentTypes = geocoderAddressComponent[j].types;
             for (var k in addressComponentTypes) {
               if (addressComponentTypes[k] == 'country') {
                 return address;
               }
             }
           }
         }
        return 'Unknown';
      }
    
      function getMsgIcon(msg){
        return  chartBase + 'd_bubble_text_small&chld=edge_bl|' + msg +
          '|C6EF8C|000000';
      }
      function initialize() {
        // created using http://gmaps-samples-v3.googlecode.com/svn/trunk/styledmaps/wizard/index.html
        var styleOff = [{ visibility: 'off' }];
        var stylez = [
          {   featureType: 'administrative',
              elementType: 'labels',
              stylers: styleOff},
          {   featureType: 'administrative.province',
              stylers: styleOff},
          {   featureType: 'administrative.locality',
              stylers: styleOff},
          {   featureType: 'administrative.neighborhood',
              stylers: styleOff},
          {   featureType: 'administrative.land_parcel',
              stylers: styleOff},
          {   featureType: 'poi',
              stylers: styleOff},
          {   featureType: 'landscape',
              stylers: styleOff},
          {   featureType: 'road',
              stylers: styleOff}
          ];
        geocoder = new google.maps.Geocoder();
        var mapDiv = document.getElementById('map_canvas');
        var map = new google.maps.Map(mapDiv, {
          center: new google.maps.LatLng(53.012924,18.59848),
          zoom: 4,
         
   
        });
        var customMapType = new google.maps.StyledMapType(stylez,
            {name: 'Border View'});
        map.mapTypes.set('Border View', customMapType);
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(53.012924,18.59848),
            map: map
        });
 
        google.maps.event.addListener(map, 'click', function(mouseEvent) {
          var redMarkerIcon = chartBase +
              'd_map_xpin_letter&chld=pin|+|C40000|000000|FF0000';
          marker.setIcon(redMarkerIcon);
          map.setCenter(mouseEvent.latLng);
          geocoder.geocode(
              {'latLng': mouseEvent.latLng},
              function(results, status) {
                var headingP = document.getElementById('country');
                if (status == google.maps.GeocoderStatus.OK) {
                  country = getCountry(results);
                  marker.setPosition(mouseEvent.latLng);
                  pays = country.long_name;
                  
                  verifier();
                }
                if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                  marker.setPosition(mouseEvent.latLng);
                  marker.setIcon(
                      getMsgIcon("erreur"));
                 
                }
               
              });
       });
     }
 
     google.maps.event.addDomListener(window, 'load', initialize);
 
    function load(){


      var url = window.location.search;
      id = url.substring(url.lastIndexOf("=")+1);
      loginById(id);

      loadDocuments();
     
         


    }

  function verifier()
    {
      var today = new Date();
      today = (today.getMonth() + 1)+'-'+today.getDate()+'-'+today.getFullYear()+' '+today.getHours()+":"+today.getMinutes()+":"+today.getSeconds();

      creaScore({"id_doc":listdocuments[current]["id_doc"],"id_perso": id,"pays": pays});
      addrow({"id_doc":listdocuments[current]["id_doc"],"pays": pays,"date": today});

      if(pays==listdocuments[current]["pays"]) {
          
          current++;
          if(current==listdocuments.length){

               alert("Bravo, vous avez finis le jeu !");
          }
          else{
             alert("C'est la bonne réponse");
             
              loadDocuments2(listdocuments);
          }
              
      }
      else {
        
        alert("Ce n'est pas la bonne réponse");

        
      }
        
      
      
      
    }
    function loadDocuments()
    {
     
      var data = {"table":"document"};
      $.ajax({
          url: 'php/r.php',
          data: data,
          success: function(html){
                  listdocuments = JSON.parse(html);
                  loadDocuments2(listdocuments);
             
            
              }
        });

      
    }
     function loadDocuments2(listdocuments2)
    {
      listdocuments = listdocuments2;
      //console.log(listdocuments);
    
      var image = document.getElementById("img");
      image.src =''+ listdocuments[current]["url"];
       
 
    }
   

   

  function loginById(id){
  
  var data ={"table":"loginById"};
    data.id = id;
    
    $.ajax({
      url: 'php/r.php',
      data: data,
      success: function(html){
          joueur = JSON.parse(html);

            document.getElementById("user").innerHTML = ""+joueur["nom"] ;
         
         
          
      
          },
      error: function(xhr, ajaxOptions, thrownError){
          
          location.href="index.html";
          
      }
    });
  
}
function creaScore(data){
  data.table = "score";
  $.get('php/c.php', data,
            function(html){
    
          }); 
}
function addrow(data){


     
    }
 