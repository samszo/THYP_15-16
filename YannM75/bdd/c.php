<?php
include_once 'connect.php';
include_once './lib/toolKit.php';

switch ($_GET["table"]) {
	case "score":
		createScore($_GET);
		break;
	case "personne":
		createPersonne($_GET);
		break;
	case "document":
		createDocument($_GET);
		break;		
	default:
		;
	break;
}

function createScore($data){
	global $conn;
	
	$sql = "INSERT INTO scores (id_doc, id_perso, distance, maj)
	VALUES (".$data["id_doc"].", ".$data["id_perso"].", ".$data["distance"].",NOW())";
	
	if ($conn->query($sql) === TRUE) {
		debug_to_console('create Score successfully');
	} else {
		debug_to_console('Error create Score. SQL : '. $sql );
	}	
}

function createPersonne($data){
	global $conn;
	
	$sql = "INSERT INTO personnes (nom) VALUES ("+$data["nom"]+")";

	if ($conn->query($sql) === TRUE) {
	    debug_to_console('create personnes successfully');
	} else {
	    debug_to_console('Error create Personne. SQL : '. $sql );
	}	
}

function createDocument($data){
	global $conn;
	
	$sql = "INSERT INTO documents (nom, latlng, url) VALUES (".$data["nom"].", ".$data["latlng"].", ".$data["url"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
		debug_to_console('create document successfully');
	} else {
	    debug_to_console('Error create Document. SQL : '. $sql );
	}	
}
$conn->close();
?>