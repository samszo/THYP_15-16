<html>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>
	<head>
		<meta charset="utf-8" />
	</head>
	
	<body>
	<?php
	$file_name = "datas_students.csv";
	$file_extern = "https://docs.google.com/spreadsheets/d/1ED680az81kja4nkUi89PhZldzkdwVrJVF21AwHDf6j8/pub?gid=2078932914&single=true&output=csv";
	
	$chemin = 'aster_data.csv';
	$delimiteur = ',';
	
	//Recuperation du fichier
	$file_read = fopen("$file_extern", "r");
	//Recuperation des donnees
	$nb_line = 1;
	$tab_datas = array();
	while(!feof($file_read)){
		$line = fgets($file_read,4096);  
		if($nb_line > 1){
			$tab_datas[] = $line;
		}else{
			$first_line = $line;
		}
		$nb_line = $nb_line + 1;
	}
	$tab_first_line = explode(',', $first_line);
	
	
	//Affichage du nom de chaque colonne + la reponse de la personne
	foreach($tab_datas as $indice => $line){
		unlink($chemin);
		$fichier_csv = fopen($chemin, 'w+');
		$tab_line = explode(',',$line);
		$lines_csv = array();
		
		$lines_csv = "id" . "," . "order" . "," . "score" . "," . "weight" . "," . "color" . "," . "label";

		$nb_datas = 0;
		echo "<p>";
		foreach($tab_line as $data){
			if($nb_datas > 0){
				if(strpos($tab_first_line[$nb_datas],"Langages informatiques")!== FALSE){
					if(strpos($tab_line[$nb_datas],"expert")!== FALSE){
						echo $tab_line[$nb_datas].$nb_datas . "," . $nb_datas . "," . "100" . "," . "25" . "," . "#9E0000" . "," . $tab_first_line[$nb_datas];
						//$lines_csv[] = array($tab_line[$nb_datas], $nb_datas, "100", "25", "#9E0000" , $tab_first_line[$nb_datas]);
					}elseif(strpos($tab_line[$nb_datas],"trop bon")!== FALSE){
						echo $tab_line[$nb_datas].$nb_datas . "," . $nb_datas . "," . "75" . "," . "25" . "," . "#9A0041" . "," . $tab_first_line[$nb_datas];
						//$lines_csv[] =  array($tab_line[$nb_datas],$nb_datas,"75","25","#9A0041",$tab_first_line[$nb_datas]);
					}elseif(strpos($tab_line[$nb_datas],"bon")!== FALSE){
						echo $tab_line[$nb_datas].$nb_datas . "," . $nb_datas . "," . "50" . "," . "25" . "," . "#8E0041" . "," . $tab_first_line[$nb_datas];
						//$lines_csv[] =  array($tab_line[$nb_datas],$nb_datas,"50","25","#8E0041",$tab_first_line[$nb_datas]);
					}elseif(strpos($tab_line[$nb_datas],"moins nul")!== FALSE){
						echo $tab_line[$nb_datas].$nb_datas . "," . $nb_datas . "," . "25" . "," . "25" . "," . "#5E0041" . "," . $tab_first_line[$nb_datas];
						//$lines_csv[] =  array($tab_line[$nb_datas],$nb_datas,"25","25","#5E0041",$tab_first_line[$nb_datas]);
					}else{
						echo $tab_line[$nb_datas] . "," . $nb_datas . "," . "0" . "," . "25" . "," . "#4E0041" . "," . $tab_first_line[$nb_datas];
						//$lines_csv[] =  array($tab_line[$nb_datas],$nb_datas,"0","25","#4E0041",$tab_first_line[$nb_datas]);
					}
					
				}else{
					echo "<B>",$tab_first_line[$nb_datas], " : </B>",$tab_line[$nb_datas], "<br>";
				}
			}else{
				echo "<B><h3>",$tab_line[1], " ",$tab_line[2], "</h3></B><br>";
				echo "<a href=\"http://www.nuwave.science/wp-content/uploads/2014/11/71.jpg\"> <img src=\"http://www.nuwave.science/wp-content/uploads/2014/11/71.jpg\" width=200 height=300/> </a>";
				echo "<br><br>";
			}
			$nb_datas = $nb_datas+1;
			
		}
		
		// Boucle foreach sur chaque ligne du tableau
		foreach($lines_csv as $ligne){
			fputcsv($fichier_csv, $ligne, $delimiteur);
		}

// fermeture du fichier csv
fclose($fichier_csv);
		
		echo "</p>";
		echo "<script src=\"draw.js\" ></script>";
		echo "</p>";
		
		
	}
	
	
	?>
	</body>
</html>