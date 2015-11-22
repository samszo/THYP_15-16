<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "score":
		createScore($_GET);
		break;
	case "personne":
		createPersonne($_GET);
		break;
	case "document":
		getDoc();
		break;
		case "coords":
		getCoords($_GET["idDoc"]);
		break;		
	default:
		;
	break;
}

function createScore($data){
	global $conn;
	
	$sql = "INSERT INTO scores (id_doc, id_perso, distance, maj)
	VALUES (".$data["id_doc"].", ".$data["id_perso"].", ".$data["distance"].",NOW())";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

 

function getDoc(){
	global $conn;
	$tab_returned = array();
	$sql = "SELECT * FROM documents ";
	//echo $sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$tab_returned[] = $row;

					
		}
		echo json_encode($tab_returned);
		return;

	
	} else {
		return http_response_code(500);
	}	
}


function getCoords($id){
	global $conn;
	$tab_returned = array();
	$sql = "SELECT * FROM coords where id_doc='".$id."'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$tab_returned[] = $row;

					
		}
		echo json_encode($tab_returned);
		return;

	
	} else {
		return http_response_code(500);
	}	
}


/*
function getCoords(){
	global $conn;
	$tab_returned = array();
	$sql = "SELECT * FROM coords ";
	//echo $sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$tab_returned[] = $row;
			
			
		}

	return echo json_encode($tab_returned);	
	} else {
		return http_response_code(404);
	}	
	
}
*/


$conn->close();
