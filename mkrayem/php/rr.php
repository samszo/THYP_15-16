<?php
	
	include_once 'connect.php';

	switch ($_GET["table"]) {
		case "score":
			selectScore($_GET);
			break;
		case "personne":
			selectPersonne($_GET);
			break;
		case "AllUsers":
			selectAllUsers();
			break;
		case "AllScores":
			selectAllScores();
			break;
		case "AllDocuments":
			selectDocuments();
			break;
		case "document":
			selectOneDocument($_GET);
			break;				
		default:
			;
		break;
	}
	
	function selectAllScores(){
		global $conn;
		$list= array();
		
		$sql = "SELECT * FROM scores";

		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_row()) {
				$list[] = $row;
				//echo $row,'<br>';
			}

			echo json_encode($list);
		}else{
			debug_to_console('No Result. Select Score. SQL : '. $sql );
		}
	}

	function selectScore($data){
		global $conn;
		
		$sql = "SELECT * FROM scores where id_doc =".$data["id_doc"]." AND id_perso=".$data["id_perso"];
		
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo json_encode($row);
				return;
			}
		} else {
			debug_to_console('No Result. Select Score. SQL : '. $sql );
		}	
	}

	function selectPersonne($data){
		global $conn;
		
		$sql = "SELECT * FROM personnes where id_perso =".$data["id_perso"];
		//echo $sql;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo json_encode($row);
				return;
			}
		}else{
			debug_to_console('No Result. Select Personne. SQL : '. $sql );
		}
	}

	function selectAllUsers(){
		global $conn;
		$list= array();
		
		$sql = "SELECT * FROM personnes";

		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_row()) {
				$list[] = $row;
				//echo $row,'<br>';
			}

			echo json_encode($list);
		}else{
			debug_to_console('No Result. Select Personne. SQL : '. $sql );
		}
	}

	function selectDocuments(){
		global $conn;
		$list= array();
		$tab_ligne=array();
		$id='id_doc';
		$name='nom';
		$lat='lat';
		$lng='lng';
		$url='url';
		
		$sql = "SELECT id_doc, nom,  X(latlng) lat, Y(latlng) lng , url FROM documents";

		
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {

			 $nbLigne=0;
			while ($row = $result->fetch_row()) {

				$list[] = $row;
			}

			echo json_encode($list);
		}else{
			debug_to_console('No Result. Select Document. SQL : '. $sql );
		}
	}
	
		function selectOneDocument($data){
		global $conn;
		$list= array();
		$tab_ligne=array();
		$id='id_doc';
		$name='nom';
		$lat='lat';
		$lng='lng';
		$url='url';
		
		$sql = "SELECT id_doc, nom,  X(latlng) lat, Y(latlng) lng , url FROM documents WHERE id=" .$data["id"];

		
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {

			 $nbLigne=0;
			while ($row = $result->fetch_row()) {

				$list[] = $row;
			}

			echo json_encode($list);
		}else{
			debug_to_console('No Result. Select Document. SQL : '. $sql );
		}
	}
	

	$conn->close();
?>