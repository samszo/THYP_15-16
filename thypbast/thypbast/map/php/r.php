<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "score":
		selectScore($_GET);
		break;
	case "scores":
		selectScores($_GET);
		break;
	case "allscores":
		selectAllScores($_GET);
		break;
	case "selectPersonneByName":
		selectPersonneByName($_GET);
		break;	
	case "personne":
		selectPersonne($_GET);
		break;
	case "personnes":
		selectPersonnes();
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
	//echo $sql."<br>".$result->num_rows."<br>";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo json_encode($row);
		}
	} else {
	   echo "";
	}	
}

function selectAllScores($data){
	global $conn;
	$list= array();
	$sql = "SELECT * FROM scores ";
	//echo $sql."<br>".$result->num_rows."<br>";
	$result = $conn->query($sql);
	if ($result && $result->num_rows) {
		while($row = $result->fetch_assoc()) {
			$list[] = $row;
		}
		echo json_encode($list);
	} else {
	    echo "";
	}	
	
}

function selectScores($data){
	global $conn;
	$list= array();
	$sql = "SELECT * FROM scores where id_perso=".$data["id_perso"];
	//echo $sql."<br>".$result->num_rows."<br>";
	$result = $conn->query($sql);
	if ($result && $result->num_rows) {
		while($row = $result->fetch_assoc()) {
			$list[] = $row;
		}
		echo json_encode($list);
	} else {
	    echo "";
	}	
	
}
function selectPersonneByName($data){
	global $conn;
	
	$sql = "SELECT * FROM personnes where  nom = '". $data["nom"]."'";
	//echo $sql."<br>";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc(); 
		 echo json_encode($row);
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

function selectPersonnes(){
	global $conn;
	$list= array();
	$sql = "SELECT * FROM personnes";
	$result = $conn->query($sql);
	
	//echo $sql."<br>".$result->num_rows."<br>";
	if ($result && $result->num_rows) {
		while($row = $result->fetch_assoc()) {
			$list[] = $row;
		}
		echo json_encode($list);
	}
}

function selectDocuments(){
	global $conn;
	$list= array();
	$sql = "SELECT id_doc, nom,  X(latlng) lat, Y(latlng) lng , url FROM documents";
	$result = $conn->query($sql);
	
	//echo $sql."<br>".$result->num_rows."<br>";
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			//print_r($row);
			$list[] = $row;
		}
		echo json_encode($list);
	}
}

function connect($data){
	global $conn;
	
	$sql = "SELECT * FROM personnes where nom ='".$data["github"]."'";
	//echo $sql;
	$result = $conn->query($sql);
	
	if ($result && $result->num_rows) {
		while($row = $result->fetch_assoc()) {
			echo json_encode($row);
		}	
	} else {
		return http_response_code(500);
	}	
	
}



$conn->close();
