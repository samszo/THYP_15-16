<?php
include_once 'connect.php';
include_once './lib/toolKit.php';

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
	$sql = "update table scores set where  id_scores ='".$data["id_score"]."'";

	if ($conn->query($sql) === TRUE) {
		debug_to_console('update Score successfully');
	} else {
		debug_to_console('update Score. SQL : '. $sql );
	}	
}

function updatePersonne($data){
	global $conn;
	
	$sql = "update table personnes set id_doc="$data["id_doc"].", id_perso= ".$data["id_perso"].", distance=".$data["distance"].",maj = NOW() where id_scores =".$data["id_score"];
	
	if ($conn->query($sql) === TRUE) {
		debug_to_console('update Personne successfully');
	} else {
		debug_to_console('update Personne. SQL : '. $sql );
	}		
}

function updateDocument($data){
	global $conn;
	// should format latlng in js
	$sql = "update table documents set nom= ".$data["nom"]." latlng=".$data["latlng"]." url=".$data["url"]." where  id_doc =".$data["id_doc"];
	
	if ($conn->query($sql) === TRUE) {
		debug_to_console('update Document successfully');
	} else {
		debug_to_console('update Document. SQL : '. $sql );
	}	
}

$conn->close();
?>