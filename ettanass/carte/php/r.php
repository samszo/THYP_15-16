<?php
include_once 'connect.php';

switch ($_GET["table"]) {
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

function readScore($data){
	global $conn;
	
	$sql = "SELECT * FROM scores where id_scores =".$data["id_score"];
	echo $sql."<br>";
	$result = $conn->query($sql);


	if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {
		echo "id_score: " . $row["id_scores"]. " id_perso: " . $row["id_perso"]." id_doc: " . $row["id_doc"]."<br>";
		}

		echo "score readed successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function readPersonne($data){
	global $conn;
	
	$sql = "SELECT * FROM personnes where ( id_perso =".$data["id_perso"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "personne readed successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function readDocument($data){
	global $conn;
	
	$sql = "SELECT * FROM documents where ( id_doc =".$data["id_doc"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "document readed successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
$conn->close();