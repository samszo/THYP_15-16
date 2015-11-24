
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
	        			
	        			$("#pass").html("Compte créé.");
	        			
						$('#myModal').modal('hide');
						
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
					  
					location.href="api/map.html?id="+joueur["id_perso"];
            
            
            
			
       		},
		  error: function(xhr, ajaxOptions, thrownError){
					
					$("#pass").html("Login introuvable !");	
					
			}
		});
	
}

///////////////////////////////////////////////////////////////////////////////////////////////

 //    FONCTIONS POUR MAPAGE.HTML

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
          mapTypeId: 'Border View',
          draggableCursor: 'pointer',
          draggingCursor: 'wait',
          mapTypeControlOptions: {
              mapTypeIds: ['Border View']
              }
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
                  headingP.innerHTML = country.long_name+ ' <br> ';
                  verifier();
                }
                if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                  marker.setPosition(mouseEvent.latLng);
                  marker.setIcon(
                      getMsgIcon("Vous êtes dans l'eau ! "));
                  headingP.innerHTML = "Vous êtes dans l'eau !";
                }
               
              });
       });
     }
 
 //    google.maps.event.addDomListener(window, 'load', initialize);
 
    function load(){


      var url = window.location.search;
      id = url.substring(url.lastIndexOf("=")+1);
      loginById(id);

      loadDocuments();
     
           $('#gridscore').w2grid({ 
        name: 'gridscore', 
        show: { 
            toolbar: true,
            footer: true,
            toolbarSave: true
        },
        columns: [                
            { field: 'recid', caption: '', size: '50px', sortable: true, resizable: true },
           
            { field: 'id_doc', caption: 'ID Document', size: '120px', sortable: true, resizable: true, 
                editable: { type: 'text' }
            },
             { field: 'pays', caption: 'Pays', size: '120px', sortable: true, resizable: true, 
                editable: { type: 'text' }
            },
            { field: 'maj', caption: 'maj', size: '120px', sortable: true, resizable: true, 
                editable: { type: 'date' }
            },
   
        ],
     
    });


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
                swal({   title: 'Vous avez gagné !',   
                  imageUrl: 'http://www.nicolaschauvindesign.com/01/images/cup_1_h200.png',   
                  animation: false,
                  confirmButtonColor: "#DD6B55",   
                  confirmButtonText: "Quitter le jeu",   
                  closeOnConfirm: false  
                }, function(){
                   location.href="index.html"; 
                 }

                );
          }
          else{
              swal("Bonne réponse!", "Passez au document suivant", "success");
              loadDocuments2(listdocuments);
          }
              
      }
      else {
        
        

        swal({   
          title: "Fausse réponse!",
          type: "warning",   
          timer: 800,   
          showConfirmButton: false 
        });

        
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
      document.getElementById("nomDoc").innerHTML = ''+listdocuments[current]["nom"] ;
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

/*
          var table = document.getElementById("mytable");
          var row = table.insertRow(1);

          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);

          cell1.innerHTML = ""+data["id_doc"];
          cell2.innerHTML = ""+data["pays"];
          cell3.innerHTML = ""+data["date"]; */

          w2ui['gridscore'].add({ 
                                recid: ' ',
                                
                                id_doc: ""+data["id_doc"],
                                pays: ""+data["pays"],
                                maj: ""+data["date"]    
                                

                        });
    }
 