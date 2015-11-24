<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "score":
		createScore($_GET);
		break;
	case "personne":
		createPersonne($_GET);
		break;
	case "documents":
		createDocument($_GET);
		break;		
	default:
		;
	break;
}

//créer scores
function createScore($data){
	global $conn;
	
	$sql = "INSERT INTO `scores` (ID_SCORE, ID_PERSO, ID_DOC, DISTANCE, MAH)
	VALUES ('NULL', ".$data["id_perso"].", ".$data["id_doc"].", ".$data["distance"].",NOW())";

	if ($conn->query($sql) === TRUE) {
	    echo "New record scores created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

//créer Document
function createDocument($data){
	global $conn;
	
	$sql = "INSERT INTO `documents` (id,Nom, LatLng, URL)
	VALUES ('NULL',".$data["Nom"].", ".$data["latlng"].", ".$data["URL"].")";

	if ($conn->query($sql) === TRUE) {
	    echo "New record Document created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}


// créer personnes 
function createPersonne($data){
	global $conn;
	
	$sql = "INSERT INTO `personnes` (id_perso, nom)
	VALUES ('NULL', ".$data["nom"].")";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

$conn->close();

?>