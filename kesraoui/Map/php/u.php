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
	

}
function updatePersonne($data){
	global $conn;
	
	$sql = "UPDATE personnes SET nom='".$data["nom"]."' WHERE id_perso=".$data["id"]."";

	if ($conn->query($sql) === TRUE) {
	    echo "Personne updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}	
}
function updateDocument($data){
	global $conn;

	$lat = $data["lat"];
	$lng = $data["lng"];
	$location = 'POINT(' . $lat . " " . $lng . ')';
		


	$sql = "UPDATE documents SET nom='".$data["nom"]."', latlng = GeomFromText('$location'), url='".$data["url"]."'  WHERE id_doc=".$data["id"]."";

	if ($conn->query($sql) === TRUE) {
	    echo "Document updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}	





}


$conn->close();
