var joueur;
var id;



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


