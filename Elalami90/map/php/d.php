<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "score":
		deleteScore($_GET);
		break;
	case "personne":
		deletePersonne($_GET);
		break;
	case "document":
		deleteDocument($_GET);
		break;		
	default:
		;
	break;
}

function deleteScore($data){
	global $conn;
	
	// sql to delete a record
	$sql = "DELETE FROM scores WHERE id_scores=".$data["id"]." ";

	if ($conn->query($sql) === TRUE) {
	    echo "Score deleted successfully";
	} else {
	    echo "Error deleting record: " . $conn->error;
	}	
}

function deletePersonne($data){
	global $conn;
	
	// sql to delete a record
	$sql = "DELETE FROM personnes WHERE id_perso=".$data["id"]." ";

	if ($conn->query($sql) === TRUE) {
	    echo "Personne deleted successfully";
	} else {
	    echo "Error deleting record: " . $conn->error;
	}	
}

function deleteDocument($data){
	global $conn;
	
	// sql to delete a record
	$sql = "DELETE FROM documents WHERE id_doc=".$data["id"]." ";

	if ($conn->query($sql) === TRUE) {
	    echo "Document deleted successfully";
	} else {
	    echo "Error deleting record: " . $conn->error;
	}	
}




$conn->close();
