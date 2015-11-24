<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "scores":
		deleteScore($_GET);
		break;
	case "personnes":
		deletePersonne($_GET);
		break;
	case "documents":
		deleteDocument($_GET);
		break;		
	default:
		;
	break;
}

function deleteScore($data){
	global $conn;
	
	// sql to delete a record
	$sql = "DELETE FROM scores WHERE id_scores=".$data["id_scores"]." ";

	if ($conn->query($sql) === TRUE) {
	    echo "Score deleted successfully";
	} else {
	    echo "Error deleting record: " . $conn->error;
	}	
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

function deleteDocument($data){
	global $conn;
	
	// sql to delete a record
	$sql = "DELETE FROM documents WHERE id_doc=".$data["id_doc"]." ";

	if ($conn->query($sql) === TRUE) {
	    echo "Document deleted successfully";
	} else {
	    echo "Error deleting record: " . $conn->error;
	}	
}




$conn->close();
