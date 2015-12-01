var joueur;
var id;


function creerpersonne(){

		var nompersonne = document.getElementById("clogin").value;
	

		creaPers({"nom":nompersonne});

}
function creaPers(data){

		data.table = "personne";

		$.get('php/c.php',
				data,
	        		function(html){
	        			
	        			$("#pass").html("Votre compte a été créé !");
	        			
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
					  
					location.href="map.html?id="+joueur["id_perso"];
            
            
            
			
       		},
		  error: function(xhr, ajaxOptions, thrownError){
					
					$("#pass").html("Echec de connexion !");	
					
			}
		});
	
}

 /* function load(){


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


    */
	
	function creaScore(data){
  data.table = "score";
  $.get('php/c.php', data,
            function(html){
    
          }); 
}

function addrow(data){



          w2ui['gridscore'].add({ 
                                recid: ' ',
                                
                                id_doc: ""+data["id_doc"],
                                pays: ""+data["pays"],
                                maj: ""+data["date"]    
                                

                        });
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


