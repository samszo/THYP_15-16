<html>
	<head>
		<meta charset="utf-8" />
	</head>
	
	<body>
	<?php
	$file_name = "datas_students.csv";
	
	//Recuperation du fichier
	if (file_exists($file_name)) {
		$file_read = fopen("$file_name", "r"); 
	}
	else { 
		echo "No Files<br />"; 
		exit(); 
	} 
	
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
		$tab_line = explode(',',$line);
		
		$nb_datas = 0;
		echo "<p>";
		foreach($tab_line as $data){
			if($nb_datas > 0){
				echo "<B>",$tab_first_line[$nb_datas], " : </B>",$tab_line[$nb_datas], "<br>";
			}else{
				echo "<h3>Nouvelle personne :</h3>";
			}
			$nb_datas = $nb_datas+1;
		}
		echo "</p>";
		
	}
	
	
	?>

	</body>
</html>