<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	
	case "scores":
		readScore($_GET);
		break;
	case "personnes":
		readPersonne($_GET);
		break;
	case "documents":
		readDocument($_GET);
		break;		
	default:
		;
	break;
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
	
	$sql = "SELECT id_doc,nom, latIng, url FROM documents";
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
