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
	case "personnes":
		readPersonnes($_GET);
		break;
	case "scores":
		readScores($_GET);
		break;		
	default:
		;
	break;
}

function readScore($data){
	global $conn;
	
	$sql = "SELECT * FROM scores where  id_scores";
	//echo $sql."<br>";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		echo json_encode($row);	
		}

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function readScores($data){
	global $conn;
	
	$sql = "SELECT * FROM scores";
	//echo $sql."<br>";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		echo json_encode($row);	
		}

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function readPersonne($data){
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

function readPersonnes($data){
	global $conn;
	
	$sql = "SELECT * FROM personnes";
	//echo $sql."<br>";
	$result = $conn->query($sql);
	if ($result && $result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
		$tab1[] = $row; 
}
		 echo json_encode($tab1);
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function readDocument($data){
	global $conn;
	$tab = array(); 
	
	$sql = "SELECT id_doc, nom, ST_AsText(latlng), url FROM documents";
	// echo $sql."<br>";
	$latlng = "ST_AsText(latlng)";
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

		$coord = $row[$latlng];
		preg_match('#\((.*?)\)#', $coord, $matches);

        $espace = strrpos($matches[1], ' ');
		
		$row["lat"] = substr($matches[1], 0, $espace);
		
		$row["lng"] = substr($matches[1], $espace);

		unset($row["ST_AsText(latlng)"]);

		array_push($tab, $row);
		shuffle($tab);
		}
		 echo json_encode($tab);


	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

$conn->close();
?>
