<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	
	case "personne":
		updatePersonne($_GET);
		break;
	case "colis":
		updateColis($_GET);
		break;		
	default:
		;
	break;
}




function updatePersonne($data){
	global $conn;
	
	$sql = "UPDATE personne SET nom='".$data["nom_personne"]."' WHERE id_perso=".$data["id_personne"]."";

	if ($conn->query($sql) === TRUE) {
	    echo "Personne updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}	
}
function updateColis($data){
	global $conn;

	
		


	$sql = "UPDATE colis SET nomc='".$data["libelle_colis"]."' WHERE id_col=".$data["id_colis"]."";


	if ($conn->query($sql) === TRUE) {
	    echo "Colis updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}	





}


$conn->close();
