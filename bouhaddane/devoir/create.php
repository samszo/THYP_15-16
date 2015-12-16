<?php
include_once 'connect.php';
switch ($_GET["table"]) {
	
	case "personne":
		createPersonne($_GET);
		break;
	case "colis":
		createColis($_GET);
		break;		
	default:
		;
	break;
}

function createPersonne($data){
	global $conn;
	
	
	$sql = "INSERT INTO personne (nom_personne)
	VALUES ('".$data["nom_personne"]."')";
	echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
function createColis($data){
	global $conn;
	
	$sql = "INSERT INTO colis (libelle_colis)
	VALUES ('".$data["libelle_colis"]."')";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
$conn->close();
