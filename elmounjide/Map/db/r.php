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
	
	$sql = "SELECT * FROM scores";
	$result = $conn->query($sql);
	//echo $sql;
	if ($result->num_rows > 0) {
    // output data of each row
		echo "<h1>Résultat Table score</h1>";
	    while($row = $result->fetch_assoc()) {
	        echo "id: " . $row["id_scores"]. " - id perso: " . $row["id_perso"]. " - id doc " . $row["id_doc"]. " - distance " . $row["distance"]. " - maj " . $row["maj"]."<br>";
	    }
	} else {
    	echo "0 results";
	}	
}

function readPersonne($data){
	global $conn;
	
	$sql = "SELECT * FROM personnes";
	$result = $conn->query($sql);
	//echo $sql;
	if ($result->num_rows > 0) {
    // output data of each row
		echo "<h1>Résultat Table personnes</h1>";
	    while($row = $result->fetch_assoc()) {
	        echo "id: " . $row["id_perso"]. " - Nom : " . $row["nom"]. "<br>";
	    }
	} else {
    	echo "0 results";
	}	
}

function readDocument($data){
	global $conn;
	
	$sql = "SELECT * FROM documents";
	$result = $conn->query($sql);
	//echo $sql;
	if ($result->num_rows > 0) {
    // output data of each row
		echo "<h1>Résultat Table documents</h1>";
	    while($row = $result->fetch_assoc()) {
	        echo "id: " . $row["id_doc"]. " - Nom : " . $row["nom"]." - Lat : " . $row["lat"]." - Lng : " . $row["lng"]." - URL : " . $row["url"] . "<br>";
	    }
	} else {
    	echo "0 results";
	}	
}



$conn->close();
