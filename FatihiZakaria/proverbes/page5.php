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
			$lngProverbe = 'français';
	        $lngProverbe = utf8_decode($lngProverbe);

	        // l'url de la page
	        $url = 'https://www.coindeweb.net/citations/proverbes.html';

	        // extraire tout le contenu html de l'url
	        $page = file_get_html($url);

	        // Ajouter l'url à la base de données
	        if(!empty($page)){
	        	//Insert Url in Table Pages
		        $sql = "INSERT INTO pages (urlPage) VALUES ('".$url."')";
		        $conn->query($sql);

	        }
	        		           
	        //Récupérer les proverbes
	        $proverbes = $page->find('div[align=left] p a');

	        // Sortir si le tableau des proverbes est vide
			if(empty($proverbes)){
				echo '<h3 class="title4">Fin du traitement</h3>';
			}	

			// Parcourir tout le tableau qui contient les proverbes
	        $counterProverbe = 0;
	        foreach($proverbes as $proverbe)
	        {       	
	        	$counterProverbe++;
	            // Récuperer l'id de l'url courante dans la table Pages
	            $sql = "SELECT MAX(idPage) FROM pages";
	            $row = $conn->query($sql);
	            $maxId = $row->fetch_assoc();

	            // id de traduction du proverbe 0 par défaut
	            $idProverbeTraduction = 0;

	            // supprimer les balises du proverbes
				$proverbe = strip_tags($proverbe);
				
	            //l'encodage du texte du proverbe
	            $proverbe = utf8_decode(addslashes($proverbe));
	            $proverbe = stripslashes($proverbe);
	            $proverbe = html_entity_decode($proverbe, ENT_QUOTES, 'cp1252');
	            $proverbe = preg_replace(array('/[\'^£$%&*()}{@#~?><>;|=_."+¬-]/'), '',$proverbe);

	            // Insérer le proverbe dans la base de données avec l'id de la page
	            if(trim($proverbe) != ''){
	            	// Insert proverb in Table Proverbes
		            $sql = "INSERT INTO proverbes (proverbeContent, idPage, lngProverbe, idProverbeTraduction) 
		                    VALUES ('".$proverbe."',".$maxId['MAX(idPage)'].",'".$lngProverbe."',".$idProverbeTraduction.")";

		           $conn->query($sql);
	            }
	        }
	        // Afficher le nombre de proverbes trouvés
	        if($counterProverbe > 0){
 ?>	
 				<h3 class="title1"><?php echo 'Page : '.$url;  ?></h3>	
   			 	<h4 class="title2"><?php echo $counterProverbe . ' Proverbes trouv&eacute;s.'; ?></h4><hr>
 <?php
			}
?>

</body>
</html>