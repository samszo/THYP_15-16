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
			$lngProverbe = 'anglais';
	        $lngProverbe = utf8_decode($lngProverbe);

	        // Set Url Dynamicly
	        $url = 'https://en.wikiquote.org/wiki/Talk:Haitian_proverbs';

	        $page = file_get_html($url);

	        if(!empty($page)){
	        	//Insert Url in Table Pages
		        $sql = "INSERT INTO pages (urlPage) VALUES ('".$url."')";
		        $conn->query($sql);

	        }
	        		           
	        //Get List of Roverbs
	        $proverbes = $page->find('ul li ul li');

	        // exist for and go to next letter
			if(empty($proverbes)){
				echo '<h3 class="title4">Fin du traitement</h3>';
				break;
			}	

	        $counterProverbe = 0;
	        foreach($proverbes as $proverbe)
	        {   
	        	
	        	$counterProverbe++;
	            // get Last idPage insered
	            $sql = "SELECT MAX(idPage) FROM pages";
	            $row = $conn->query($sql);
	            $maxId = $row->fetch_assoc();

	            // 0 if traduction of proverbe does not exist
	            $idProverbeTraduction = 0;

	            // Delete Balise <strong></strong>
	            preg_match_all("|<[^>]+>(.*)</[^>]+>|U",$proverbe, $out, PREG_PATTERN_ORDER);

	            //Solve probleme UTF8
	            $proverbe = utf8_decode(addslashes($out[1][0]));

	            if(!empty($proverbe)){
	            	// Insert proverb in Table Proverbes
		            $sql = "INSERT INTO proverbes (proverbeContent, idPage, lngProverbe, idProverbeTraduction) 
		                    VALUES ('".$proverbe."',".$maxId['MAX(idPage)'].",'".$lngProverbe."',".$idProverbeTraduction.")";

		           $conn->query($sql);
	            }
	        }
	        if($counterProverbe > 0){
 ?>	
 				<h3 class="title1"><?php echo 'Page : '.$url;  ?></h3>	
   			 	<h4 class="title2"><?php echo $counterProverbe . ' Proverbes trouv&eacute;s.'; ?></h4><hr>
 <?php
			}
?>

</body>
</html>