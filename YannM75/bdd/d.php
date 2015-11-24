<?php
	include_once 'connect.php';

	switch ($_GET["table"]) {
		case "score":
			deleteScore($_GET);
			break;
		case "personne":
			deletePersonne($_GET);
			break;
		case "documents":
			deleteDocument($_GET);
			break;		
		default:
			;
		break;
	}

	//créer scores
	function deleteScore($data){
		global $conn;
		
		$sql = "DELETE FROM `scores` WHERE `ID_SCORE`='".$data["id_score"]."';";

		if ($conn->query($sql) === TRUE) {
			echo "New record scores DELETED successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}	
	}

	//créer Document
	function deleteDocument($data){
		global $conn;
		
		$sql = "DELETE FROM `documents` WHERE `Nom`='".$data["Nom"]."';";

		if ($conn->query($sql) === TRUE) {
			echo "New record Document DELETED successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}	
	}


	// créer personnes 
	function deletePersonne($data){
		global $conn;
		
		$sql = "DELETE FROM `personnes` WHERE `Nom`='".$data["Nom"]."';";

		if ($conn->query($sql) === TRUE) {
			echo "New record DELETED successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}	
	}

	mysql_close($conn);

?>