<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "scores":
		deleteScores($_GET);
		break;
	case "personnes":
		deletePersonnes($_GET);
		break;
	case "documents":
		deleteDocuments($_GET);
		break;		
	default:
		;
	break;
}
// delete scores
function deleteScores($data){
	global $conn;

	$sql = "DELETE FROM  scores
			WHERE id='".$data["id"]."'";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}



//  delete personnes 
function deletePersonnes($data){
	global $conn;
	$sql = "DELETE FROM  personnes
			WHERE id_perso='".$data["id_perso"]."'";
	
	echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}




// delete documents

function deleteDocuments($data){
	global $conn;
	$sql = "DELETE FROM  documents
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