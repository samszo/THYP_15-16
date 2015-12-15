<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "scores":
		updateScore($_GET);
		break;
	case "personnes":
		updatePersonne($_GET);
		break;
	case "documents":
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
	
	$sql = "UPDATE personnes SET nom='".$data["nom"]."' WHERE id_perso=".$data["id_perso"]."";

	if ($conn->query($sql) === TRUE) {
	    echo "Personne updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}	
}
function updateDocument($data){
	global $conn;

	$lat = $data["latIng"];
	$lng = $data["longIng"];
	$location = 'POINT(' . $latIng . " " . $longIng . ')';
		


	$sql = "UPDATE documents SET nom='".$data["nom"]."', latlng = GeomFromText('$location'), url='".$data["url"]."'  WHERE id_doc=".$data["id"]."";

	if ($conn->query($sql) === TRUE) {
	    echo "Document updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}	





}


$conn->close();
