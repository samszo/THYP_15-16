function load(){

    gridPersonne();
    
}

function gridPersonne(){
        
        var data ={"table":"personne"};
       var personnes;
     

        $.ajax({
          url: 'php/r.php',
          data: data,
          success: function(html){
                    personnes = JSON.parse(html);

                   
                    console.log(personnes);
                
                    for (var i = 0 ; i < personnes.length; i++) {
                        w2ui['gridperso'].add({ 
                            recid: personnes[i]["id"], 
                            nom: ''+personnes[i]["nom"], 
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
            { field: 'email', caption: 'email', size: '120px', sortable: true, resizable: true, 
                editable: { type: 'text' }
            },
            { field: 'adresse', caption: 'adresse', size: '120px', sortable: true, resizable: true, 
                editable: { type: 'text' }
            },
   
        ],
     
    });
}
