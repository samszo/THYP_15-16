<!DOCTYPE html>
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script src="../js/jquery.min.js" ></script>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		
		<link rel="stylesheet" type="text/css" href="http://w2ui.com/src/w2ui-1.4.2.min.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
		<script type="text/javascript" src="http://w2ui.com/src/w2ui-1.4.2.min.js"></script>
        <title>THYP Yann MAHUET</title>

    </head>
	
	<body>
		<header>
			<h1>Cours sur la maîtrise de w2ui</h1>
			<h2>Professeur : Samuel Szoniecky</h2>
			<h3>Etudiant : Yann Mahuet</h3>
			<a href="index.php"> Retour Index</a>
		</header>
		<br>
		
		<h3>Documents</h3>

		<div id="grid" style="width: 100%; height: 400px;"></div>
		<br>
		<button class="btn" onclick="showChanged()">Get Changed</button>

		<script type="text/javascript">
			var list_docs;
			var tab_w2;
			var ready = 0;
			var list_documents;
			
			
			
			function getAllDocs(){
				var data = {"table":"AllDocuments"};
				$.ajax({
					url: 'bdd/r.php',
					data: data,
					success: function(html){
						list_documents = JSON.parse(html);
						prepareRecords();
					}
				});
				
			}
			function prepareRecords(){
				for (i = 0; i < list_documents.length; i++){
					var tab_temp = list_documents[i];
					w2ui['grid'].add({ recid: tab_temp[0], Nom: tab_temp[1], url_IMG: tab_temp[4], lat: tab_temp[2], lng: tab_temp[3] });
				}
			}

			$(function () {
				

				$('#grid').w2grid({

					name: 'grid', 
					show: { 
						toolbar: true,
						footer: true,
						toolbarSave: true
					},
					columns: [                
						{ field: 'recid', caption: 'ID', size: '50px', sortable: true, resizable: true },
						{ field: 'Nom', caption: 'Question', size: '250px', sortable: true, resizable: true, editable: { type: 'text' }},
						{ field: 'url_IMG', caption: 'URL IMG', size: '750px', sortable: true, resizable: true, editable: { type: 'text' }},
						{ field: 'lat', caption: 'Latitude', size: '250px', sortable: true, resizable: true, editable: { type: 'text' }},
						{ field: 'lng', caption: 'Longitude', size: '250px', sortable: true, resizable: true, editable: { type: 'text' }},
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
					
				}); 

				getAllDocs();				
			});
			function showChanged() {
				console.log(w2ui['grid'].getChanges()); 
				//w2alert('Changed records are displayed in the console');
				
				var changement = w2ui['grid'].getChanges();
				for (i = 0; i < changement.length; i++){
					var element = changement[i];
					if(eltAlreadyExist(element)){
						//update
					}else{
						//Si pas de document existant avec cet ID alors on l'insert
						createNewDoc(element);
					}
				}
			}
			function eltAlreadyExist(elt){
				var data = {"table":"document"};
				data = {"id":elt["recid"]};
				
				$.ajax({
					url: 'bdd/r.php',
					data: data,
					success: function(html){
						
						try {
							list_documents = JSON.parse(html);
						}
						catch(err) {
							return false;
						}
						list_documents = JSON.parse(html);
						if(list_documents.length < 1){
							return false
						}else{
							return true;
						}
					}
				});
			}
			function createNewDoc(elt){
				
				//var data = {"table":"addDocument", "id":elt["recid"], "nom":elt["Nom"], "url":elt["url_IMG"], "lng":elt["lng"], "lat":elt["lat"] };
				//console.log(data);
				var dataTest = {"table":"addDocument"};
				$.ajax({
					url: 'bdd/controler.php',
					data: dataTest,
					success: function(html){
					}
				});
			}
		</script>
		

	</body>
</html>
<?php


?>