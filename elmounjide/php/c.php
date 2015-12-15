<?php

include_once 'connect.php';

switch ($_GET["table"]) {
	case "score":
		createScore($_GET);
		break;
	case "personne":
		createPersonne($_GET);
		break;
	case "document":
		createDocument($_GET);
		break;	
	case "addPerso":
		addP($_GET);
	break;	
	default:
		;
	break;
}

function createPersonne($data){
	global $conn;
	$sql = "SELECT * FROM personnes where nom='" . $data["nom"] . "'";
	//echo $sql;
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	echo json_encode($row);
	    }
	} else {
    	echo "\n0 results";
	}	
}


function addP($data){
	global $conn;
	$sql = "INSERT INTO personnes (nom) VALUES ('".$data["nom"]."')";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function createDocument($data){
	global $conn;
	
	$sql = "INSERT INTO documents (nom, latlng, url) VALUES ('".$data["nom"]."', ".$data["latlng"].",'".$data["url"]."')";
	echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record of type documents created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}


$conn->close();
