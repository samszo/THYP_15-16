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

	$latIng = $data["latIng"];
	$longIng = $data["longIng"];
	$location = 'POINT(' . $latIng . " " . $longIng . ')';
	

	$sql = "INSERT INTO documents (nom, latlng, url)

	VALUES ('".$data["nom"]."', GeomFromText('$location') , '".$data["url"]."')";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	





}
function auth($data){
	global $conn;
	$sql = "SELECT * FROM personnes WHERE nom='".$data["nom"]."'";
	//echo $sql;
	$result = $conn->query($sql);
	if ($result->num_rows!=null) {
		while($row = $result->fetch_assoc()) {
			
			$_SESSION['id'] = $row["id_perso"];
					
		}
		$_SESSION['nom'] = $data["nom"];
		echo json_encode(true);
		return;

	} else {
		echo json_encode(false);
		return;

	}	
}


$conn->close();
