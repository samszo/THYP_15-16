<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	
	case "personnes":
		deletePersonne($_GET);
		break;
	case "colis":
		deleteColis($_GET);
		break;		
	default:
		;
	break;
}


function deletePersonne($data){
	global $conn;
	
	// sql to delete a record
	$sql = "DELETE FROM personnes WHERE id_perso=".$data["id_perso"]." ";

	if ($conn->query($sql) === TRUE) {
	    echo "Personne deleted successfully";
	} else {
	    echo "Error deleting record: " . $conn->error;
	}	
}

function deleteColis($data){
	global $conn;
	
	// sql to delete a record
	$sql = "DELETE FROM colis WHERE num_colis=".$data["num_colis"]." ";

	if ($conn->query($sql) === TRUE) {
	    echo "colis deleted successfully";
	} else {
	    echo "Error deleting record: " . $conn->error;
	}	
}




$conn->close();
