<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div align="center">
	<h1>Web Scraping</h1>
</div> 
<hr>
<?php
	    // Include Files
	    include('lib/simple_html_dom.php');
	    include('bdd/connect.php');
	    global $conn;
	    set_time_limit(0);
?>
		<div align="center"><h2 class="title3"></h2></div>
<?php
			$lngProverbeSource = 'haitian';
			$lngProverbe = 'anglais';

	        // l'url de la page
	        $url = 'https://en.wikiquote.org/wiki/Talk:Haitian_proverbs';

	        // extraire tout le contenu html de l'url
	        $page = file_get_html($url);

	        // Ajouter l'url à la base de données
	        if(!empty($page)){
	        	//Insert Url in Table Pages
		        $sql = "INSERT INTO pages (urlPage) VALUES ('".$url."')";
		        $conn->query($sql);

	        }

	        //Récupérer les proverbes de la langue source
	        $proverbesSource 	=  $page->find('ul li i');

	        // Récupérer la traduction des premiers proverbes. 
	        $proverbes 			=  $page->find('ul li ul li');

	        // Sortir si le résultat des proverbes est vide
			if(empty($proverbesSource) || empty($proverbes)){
				echo '<h3 class="title4">Fin du traitement</h3>';
				break;
			}	

	        $counterProverbe = 0;

            // Récuperer l'id de l'url courante dans la table Pages
            $sql = "SELECT MAX(idPage) FROM pages";
            $row = $conn->query($sql);
            $maxIdPage = $row->fetch_assoc();

	        for($i=0;$i<=count($proverbesSource);$i++)
			{
				/******** Proverbes sources ***********/
				$proverbeSource = $proverbesSource[$i];
				// Supprimer les balises
				$proverbeSource = strip_tags($proverbeSource);
				
	            //encodage du texte du proverbe
	            $proverbeSource = utf8_decode(addslashes($proverbeSource));
	            $proverbeSource = stripslashes($proverbeSource);
	            $proverbeSource = html_entity_decode($proverbeSource, ENT_QUOTES, 'cp1252');
	            $proverbeSource = preg_replace(array('/[\'^£$%&*()}{@#~?><>;|=_."+¬-]/'), '',$proverbeSource);

	            /******** Proverbes traduits***********/
				$proverbe = $proverbes[$i];
				// Delete Balise
				$proverbe = strip_tags($proverbe);
				
	            //encodage du texte du proverbe
	            $proverbe = utf8_decode(addslashes($proverbe));
	            $proverbe = stripslashes($proverbe);
	            $proverbe = html_entity_decode($proverbe, ENT_QUOTES, 'cp1252');
	            $proverbe = preg_replace(array('/[\'^£$%&*()}{@#~?><>;|=_."+¬-]/'), '',$proverbe);

				if(trim($proverbeSource) != '' && trim($proverbe) != '' ){
					// Retourner le plus grand id dans la table proverbes
		            $sql = "SELECT MAX(idProverbe) FROM proverbes";
		            $row = $conn->query($sql);
		            $maxIdProverbe = $row->fetch_assoc();

		            // +1 pour le nouveau id du proverbe source
		            $idProverbeSource = $maxIdProverbe['MAX(idProverbe)'] + 1;
		            // +2 pour le nouveau id du proverbe traduit
		            $idProverbe = $maxIdProverbe['MAX(idProverbe)'] + 2;

					// Insérer le proverbe source dans la table
		            $sql = "INSERT INTO proverbes (proverbeContent, idPage, lngProverbe, idProverbeTraduction) 
		                    VALUES ('".$proverbeSource."',".$maxIdPage['MAX(idPage)'].",'".$lngProverbeSource."',".$idProverbe.")";
		           	$conn->query($sql);

		           	// Insérer le proverbe traduit dans la table
		            $sql = "INSERT INTO proverbes (proverbeContent, idPage, lngProverbe, idProverbeTraduction) 
		                    VALUES ('".$proverbe."',".$maxIdPage['MAX(idPage)'].",'".$lngProverbe."',".$idProverbeSource.")";
		           	$conn->query($sql);		
				}
				$i++;					
			}
			// Afficher le nombre de proverbes trouvés
	        if($i > 0){
 ?>	
 				<h3 class="title1"><?php echo 'Page : '.$url;  ?></h3>	
   			 	<h4 class="title2"><?php echo $i + 1 . ' Proverbes trouv&eacute;s.'; ?></h4><hr>
 <?php
			}
?>

</body>
</html>