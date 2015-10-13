<html>
	<head>
		<meta charset="utf-8" />
	</head>
	
	<body>
	<?php
	$file_name = "datas_students.csv";
	$file_extern = "https://docs.google.com/spreadsheets/d/1ED680az81kja4nkUi89PhZldzkdwVrJVF21AwHDf6j8/pub?gid=2078932914&single=true&output=csv";
	
	//Recuperation du fichier
	/**if (file_exists($file_extern)) {
		 
	}
	else { 
		echo "No File<br />"; 
		exit(); 
	} **/
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
		$tab_line = explode(',',$line);
		
		$nb_datas = 0;
		echo "<p>";
		foreach($tab_line as $data){
			if($nb_datas > 0){
				echo "<B>",$tab_first_line[$nb_datas], " : </B>",$tab_line[$nb_datas], "<br>";
			}else{
				echo "<B><h3>",$tab_line[1], " ",$tab_line[2], "</h3></B><br>";
				echo "<a href=\"http://cdn.meme.am/instances/400x/53207956.jpg\"> <img src=\"http://cdn.meme.am/instances/400x/53207956.jpg\" width=200 height=200/> </a>";
				echo "<br><br>";
			}
			$nb_datas = $nb_datas+1;
		}
		echo "</p>";
		
	}
	
	
	?>

	</body>
</html>