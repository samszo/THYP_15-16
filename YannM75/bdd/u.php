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

	function updateScores($data){

	}
	function updatePersonnes($data){

	}
	function updateDocuments($data){

	}

?>