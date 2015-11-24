<?php
include_once 'connect.php';
include_once './lib/toolKit.php';

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
	$sql = "DELETE FROM scores where  id_scores ='".$data["id_score"]."'";

	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "score deleted successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function deletePersonne($data){
	global $conn;
	
	$sql = "DELETE FROM personnes where ( id_perso =".$data["id_perso"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "personne deleted successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function deleteDocument($data){
	global $conn;
	
	$sql = "DELETE FROM documents where ( id_doc =".$data["id_doc"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "document deleted successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

$conn->close();
?>