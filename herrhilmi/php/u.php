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
	$sql = "update table scores set where  id_scores ='".$data["id_score"]."'";

	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "score updated successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function updatePersonne($data){
	global $conn;
	
	$sql = "update table personnes set id_doc="$data["id_doc"].", id_perso= ".$data["id_perso"].", distance=".$data["distance"].",maj = NOW() where id_scores =".$data["id_score"];
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "personne updated successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function updateDocument($data){
	global $conn;
	// should format latlng in js
	$sql = "update table documents set nom= ".$data["nom"]." latlng=".$data["latlng"]." url=".$data["url"]." where  id_doc =".$data["id_doc"];
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "document updated successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

$conn->close();
