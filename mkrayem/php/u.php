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
// update data
function updateScores($data){
	 db(); // database function
   $id_doc = $_POST['id_doc'];
   $id_perso = $_POST['id_perso'];
   $distance = $_POST['distance'];
   $maj = $_POST['maj'];

	global $conn;
}
function updatePersonnes($data){
	 db(); // database function
  
   $id_perso = $_POST['id_perso'];
   $nom = $_POST['nom'];


	global $conn;
}







?>