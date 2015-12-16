<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	
	case "personnes":
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
	$sql = "INSERT INTO personnes (nom,prenom,adresse)
	VALUES ('".$data["nom"]."', '".$data["prenom"]." , '".$data["adresse"]."')";
	echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
function createColis($data){
	global $conn;
	$sql = "INSERT INTO colis (num_colis,adresse,nombre_colis)
	VALUES ('".$data["num_colis"]."', '".$data["adresse"]." , '".$data["nombre_colis"]."')";
	echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

?>