<?php
	include_once 'connect.php';
	
	if (isset($_GET["table"])){
		$table = $_GET['table'];
		echo $table,'<br>';
	}
	
	switch ($_GET["table"]) {
		case "score":
			selectScore($_GET);
			break;
		case "personne":
			selectPersonne($_GET);
			break;
		case "documents":
			echo 'Appel documents <br>';
			selectDocuments($_GET);
			break;
		case "nbDocuments":
			selectNBDocuments();
			break;
		default:
			;
		break;
	}

	//selection data  score
	function selectScore($data){
		global $conn;

		$select = "SELECT * FROM `scores` WHERE id_perso ='".$data["id_perso"]."' ";
		
		$result = $conn->query($select);
		
		return $result;
	}

	//selection data personne
	function selectPersonne($data){
		global $conn;
		
		$select =  "SELECT * FROM `personnes` WHERE id_perso ='".$data["id_perso"]."' ";
		
		$result = $conn->query($select);
		
		return $result;
	}
	
	//selection data documents
	function selectDocuments($data){
		global $conn;
		$select =  "SELECT * FROM `documents` WHERE id_doc ='".$data["id_doc"]."' ;";

		$result = $conn->query($select);
		
		echo 'result : '.$result.'<br>';
		while ($data =  $result){
			echo $data['NOM'],'<br>';
		}

		return $result;
	}
	
	function selectNBDocuments(){
		global $conn;
		$select =  "SELECT COUNT(*) FROM `documents`";
		
		$result = $conn->query($select);
		
		return $result;
	}


	//mysql_close($conn);
?>