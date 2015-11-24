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
/
// update data personnes 
function updatePersonnes($data){
	 db(); // database function
  
   $id_perso = $_POST['id_perso'];
   $nom = $_POST['nom'];


	global $conn;
}

// update data documents 
function updateDocuments($data){
	 db(); // database function
  $id_doc = $_POST['id_doc'];
  $nom = $_POST['nom'];
  $lating = $_POST['lating'];
  $url = $_POST['url'];   


	global $conn;
}







?>