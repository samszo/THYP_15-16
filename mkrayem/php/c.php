<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "scores":
		createScore($_GET);
		break;
	case "personnes":
		createPersonne($_GET);
		break;
	case "documents":
		createDocument($_GET);
		break;		
	default:
		;
	break;
}

function createScore($data){
	global $conn;
	
	$sql = "INSERT INTO scores (id_doc, id_perso, distance, maj)
	VALUES (".$data["id_doc"].", ".$data["id_perso"].", ".$data["distance"].",NOW())";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
function createPersonne($data){
	global $conn;
	
	
	
	$sql = "INSERT INTO personnes (nom)
	VALUES ('".$data["nom"]."')";
	echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
function createDocument($data){
	global $conn;
$nom
	$latIng = $data["latIng"];
	$longIng = $data["longIng"];
	$location = 'POINT(' . $latIng . " " . $longIng . ')';
	

	$sql = "INSERT INTO documents (nom, latlng,longIng, url)

	VALUES ('".$data["nom"]."', GeomFromText('$location') , '".$data["url"]."')";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	





}


$conn->close();
