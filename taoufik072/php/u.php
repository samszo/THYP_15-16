<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "scores":
		updateScores($_GET);
		break;
	case "personnes":
		updatePersonnes($_GET);
		break;
	case "documents":
		updateDocuments($_GET);
		break;		
	default:
		;
	break;
}
//update scores
function updateScores($data){
	global $conn;
	
	$sql = "UPDATE scores
			SET distance='".$data["distance"]."', id_doc='".$data["id_doc"]."', id_perso='".$data["id_perso"]."',maj=NOW()
			WHERE id='".$data["id"]."'";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}



// update personnes 
function updatePersonnes($data){
	global $conn;
	$sql = "UPDATE personnes
			SET nom='".$data["nom"]."', prenom='".$data["prenom"]."',date_crea=NOW()
			WHERE id_perso='".$data["id_perso"]."'";
	
	echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}




//update documents

function updateDocuments($data){
	global $conn;
	$sql = "UPDATE documents
			SET nom_doc='".$data["nom_doc"]."', lating='".$data["lating"]."', url='".$data["url"]."',date_crea=NOW()
			WHERE id_doc='".$data["id_doc"]."'";

	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

$conn->close();






?>