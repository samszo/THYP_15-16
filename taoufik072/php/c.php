<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "scores":
		createScores($_GET);
		break;
	case "personnes":
		createPersonnes($_GET);
		break;
	case "documents":
		createDocuments($_GET);
		break;		
	default:
		;
	break;
}

//créer scores
function createScores($data){
	global $conn;
	
	$sql = "INSERT INTO scores (id_doc, id_perso, distance, maj)
	VALUES ('".$data["id_doc"]."', '".$data["id_perso"]."', '".$data["distance"]."',NOW())";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}



// créer personnes 
function createPersonnes($data){
	global $conn;
	
	$sql = "INSERT INTO personnes ( nom, prenom, date_crea )
	VALUES ('".$data["nom"]."','".$data["prenom"]."',NOW())";
	echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}




//créer documents

function createDocuments($data){
	global $conn;
	
	$sql = "INSERT INTO documents (id_doc, nom_doc,lating,url,date_crea)
	VALUES ('".$data["nom_doc"]."', '".$data["lating"]."', '".$data["url"]."',now())";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

$conn->close();

?>