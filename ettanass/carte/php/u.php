<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "score":
		updateScore($_GET);
		break;
	case "personne":
		updatePersonne($_GET);
		break;
	case "document":
		updateDocument($_GET);
		break;		
	default:
		;
	break;
}

function updateScore($data){
	global $conn;
	
	$sql = "INSERT INTO scores  (id_doc, id_perso, distance, maj)
	VALUES (".$data["id_doc"].", ".$data["id_perso"].", ".$data["distance"].",NOW())";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record updated successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
function updatePersonne($data){	
	global $conn;
	
	$sql = "INSERT INTO personnes (nom)
	VALUES (".$data["nom"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record updated successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
function updateDocument($data){
		global $conn;
	
	$sql = "INSERT INTO documents (id_doc, nom, latlng, url)
	VALUES (".$data["id_doc"].", ".$data["nom"].", ".$data["latlng"].",".$data["url"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record updated successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}


$conn->close();
?>