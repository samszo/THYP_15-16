<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "loginById":
		loginById($_GET);
		break;

	case "login":
		login($_GET);
		break;
	case "score":
		readScore($_GET);
		break;
	case "personne":
		readPersonne($_GET);
		break;
	case "document":
		readDocument($_GET);
		break;		
	default:
		;
	break;
}
function loginById($data){
	global $conn;
	
	$sql = "SELECT * FROM personnes where id_perso =".$data["id"]."";
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

function login($data){
	global $conn;
	
	$sql = "SELECT * FROM personnes where nom ='".$data["username"]."'";
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


function readScore($data){
	global $conn;
	
	$sql = "SELECT * FROM scores";
	$result = $conn->query($sql);
	//echo $sql;
	$lists= array();
	if ($result->num_rows > 0) {
    // output data of each row
		
	    while($row = $result->fetch_assoc()) {
	        $lists[] = $row;
	    }
	    echo json_encode($lists);
	} else {
    	echo "0 results";
	}	
}

function readPersonne($data){
	global $conn;
	
	$sql = "SELECT * FROM personnes";
	$result = $conn->query($sql);
	//echo $sql;
	$lists= array();
	if ($result->num_rows > 0) {
    // output data of each row
		
	    while($row = $result->fetch_assoc()) {
	          $lists[] = $row;
	    }
	    echo json_encode($lists);
	} else {
    	echo "0 results";
	}	
}

function readDocument($data){
	global $conn;
	
	$sql = "SELECT id_doc,nom, pays, url FROM documents";
	$result = $conn->query($sql);
	//echo $sql;
	$lists= array();
	if ($result->num_rows > 0) {
    // output data of each row
		//echo "<h1>Résultat Table documents</h1>";
	    while($row = $result->fetch_assoc()) {
	        $lists[] = $row;
	    }
	    echo json_encode($lists);
	} else {
    	echo "0 results";
	}	
}



$conn->close();
