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

