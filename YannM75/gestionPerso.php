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
		
		<h3>Personnes : </h3>

		<div id="grid" style="width: 100%; height: 400px;"></div>
		<br>
		<button class="btn" onclick="showChanged()">Get Changed</button>

		<script type="text/javascript">
			var list_docs;
			var tab_w2;
			var ready = 0;
			var list_documents;
			
			
			
			function getAllDocs(){
				var data = {"table":"AllUsers"};
				$.ajax({
					url: 'bdd/r.php',
					data: data,
					success: function(html){
						console.log('fct to get all personnes');
						list_documents = JSON.parse(html);
						prepareRecords();
					}
				});
				
			}
			function prepareRecords(){
				for (i = 0; i < list_documents.length; i++){
					var tab_temp = list_documents[i];
					w2ui['grid'].add({ recid: tab_temp[0], Nom: tab_temp[1]});
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
						{ field: 'recid', caption: 'ID', size: '250px', sortable: true, resizable: true },
						{ field: 'Nom', caption: 'Pseudo', size: '250px', sortable: true, resizable: true, editable: { type: 'text' }},
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
				w2alert('Changed records are displayed in the console');
			}
		</script>
		

	</body>
</html>
<?php


?>