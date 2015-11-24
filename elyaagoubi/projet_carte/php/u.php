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
	
	$sql = "UPDATE scores SET distance =".$data["distance"]. ", maj = NOW() WHERE id_scores =".$data["id_scores"];
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record updated successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
function updatePersonne($data){	
	global $conn;
	
	$sql = "UPDATE `personnes` SET `nom`=[value-2] WHERE id_perso =".$data["id_perso"]."";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record updated successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
function updateDocument($data){
		global $conn;
	
	$sql = "UPDATE `documents` SET `id_doc`=[value-1],`nom`=[value-2],`latlng`=[value-3],`url`=[value-4] WHERE id_doc =".$data["id_doc"]."";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record updated successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}


$conn->close();
?>