<?php
include_once 'connect.php';
switch ($_GET["table"]) {
	case "personne":
		createPersonne($_GET);
		break;
	case "colis":
		createcolis($_GET);
		break;
			
	default:
		;
	break;
}
function createPersonne($data){
	global $conn;
	
	$sql = "INSERT INTO personne ( nom, email, adresse)
	VALUES ( '".$data["nom"]."','".$data["email"]."','".$data["adresse"]."')";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
function createcolis($data){
	global $conn;
	
	$sql = "INSERT INTO colis ( descreptif, id_personne)
	VALUES ( '".$data["desc"]."', ".$data["id_personne"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
$conn->close();