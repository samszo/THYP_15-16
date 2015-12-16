function load(){

    gridPersonne();
    
    
}
function affichercolis(){


        var id = document.getElementById("idp").value;

        var data ={"table":"colis","idpersonne":id};
       var colis;
        $.ajax({
          url: 'Php/r.php',
          data: data,
          success: function(html){
                    colis = JSON.parse(html);

                   
                    console.log(colis);
                
                    for (var i = 0 ; i < colis.length; i++) {
                        w2ui['gridcolis'].add({ 
                            recid: colis[i]["id"], 
                            desc: ''+colis[i]["descreptif"],
                            idpersonne: ''+colis[i]["idpersonne"]
                           
                        });
                    };
                    
                   
                    
            },
          error: function(xhr, ajaxOptions, thrownError){
                    
                    alert("erreur chargement de la table personne");
                    
            }
        });


      $('#gridcolis').w2grid({ 
        name: 'gridcolis', 
        show: { 
            toolbar: true,
            footer: true,
            toolbarSave: true
        },
        columns: [                
            { field: 'recid', caption: 'ID', size: '50px', sortable: true, resizable: true },
            { field: 'desc', caption: 'desc', size: '120px', sortable: true, resizable: true, 
                editable: { type: 'text' }
            },
            { field: 'idpersonne', caption: 'idpersonne', size: '120px', sortable: true, resizable: true, 
                editable: { type: 'text' }
            },
           
   
        ],
     
    });
}

function gridPersonne(){
        
        var data ={"table":"personne"};
       var personnes;
        $.ajax({
          url: 'r.php',
          data: data,
          success: function(html){
                    personnes = JSON.parse(html);

                   
                   // console.log(personnes);
                
                    for (var i = 0 ; i < personnes.length; i++) {
                        w2ui['gridperso'].add({ 
                            recid: personnes[i]["id"], 
                            nom: ''+personnes[i]["nom"],
                            prenom: ''+personnes[i]["prenom"], 
                            email: ''+personnes[i]["email"],
                            adresse: ''+personnes[i]["adresse"]
                        });
                    };
                    
                   
                    
            },
          error: function(xhr, ajaxOptions, thrownError){
                    
                    alert("erreur chargement de la table personne");
                    
            }
        });


      $('#gridperso').w2grid({ 
        name: 'gridperso', 
        show: { 
            toolbar: true,
            footer: true,
            toolbarSave: true
        },
        columns: [                
            { field: 'recid', caption: 'ID', size: '50px', sortable: true, resizable: true },
            { field: 'nom', caption: 'Nom', size: '120px', sortable: true, resizable: true, 
                editable: { type: 'text' }
            },
            { field: 'prenom', caption: 'prenom', size: '120px', sortable: true, resizable: true, 
                editable: { type: 'text' }
            },
            { field: 'email', caption: 'email', size: '120px', sortable: true, resizable: true, 
                editable: { type: 'text' }
            },
            { field: 'adresse', caption: 'adresse', size: '120px', sortable: true, resizable: true, 
                editable: { type: 'text' }
            },
   
        ],
     
    });
}

function addperso(){

    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var email = document.getElementById("email").value;
    var adresse = document.getElementById("adresse").value;
  

  
    creaPerso({"nom":nom,"prenom":prenom,"email":email,"adresse":adresse});

  }

  function creaPerso(data){

    data.table = "personne";

    $.get('c.php',
        data,
              function(html){
          alert('Personne Bien ajoutée.');
            }); 

}


function addcolis(){

    var desc = document.getElementById("desc").value;
    var idperso = document.getElementById("idpersonne").value;
 
  

  
    creaColis({"desc":desc,"idpersonne":idperso});

  }

  function creaColis(data){

    data.table = "colis";

    $.get('c.php',
        data,
              function(html){
          alert('Colis Bien ajouté.');
            }); 

}