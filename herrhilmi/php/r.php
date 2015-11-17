<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "score":
		selectScore($_GET);
		break;
	case "personne":
		selectPersonne($_GET);
		break;
	case "document":
		selectDocuments();
		break;	
	case "connect":
		connect($_GET);
		break;	
	default:
		;
	break;
}

function selectScore($data){
	global $conn;
	
	$sql = "SELECT * FROM scores where id_doc =".$data["id_doc"]." AND id_perso=".$data["id_perso"];
	echo $sql."<br>";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo json_encode($row);
			return;
		}
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function selectPersonne($data){
	global $conn;
	
	$sql = "SELECT * FROM personnes where id_perso =".$data["id_perso"];
	//echo $sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo json_encode($row);
			return;
		}
	}
}

function selectDocuments(){
	global $conn;
	$list= array();
	$sql = "SELECT id_doc, nom,  X(latlng) lat, Y(latlng) lng , url FROM documents";
	//echo $sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$list[] = json_encode($row);
		}
		
		echo json_encode($list);
	}
}

function connect($data){
	global $conn;
	
	$sql = "SELECT * FROM personnes where nom ='".$data["github"]."'";
	//echo $sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo json_encode($row);
			return;
		}
		
	} else {
		return http_response_code(500);
	}	
	
}

$conn->close();
