<?php
session_start();

include_once 'connect.php';

switch ($_GET["table"]) {
	case "score":
		createScore($_GET);
		break;
	case "getscore":
		getScore();
		break;		
	case "personne":
		createPersonne($_GET);
		break;
	case "deletepersonne":
		deletePersonne($_GET);
		break;
	case "updatepersonne":
		updatePersonne($_GET);
		break;
	case "getpersonne":
		getPersonne();
		break;		
	case "auth":
		auth($_GET);
		break;	
	case "document":
		getDoc();
		break;
	case "coords":
		getCoords($_GET["idDoc"]);
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
	
	$sql = "INSERT INTO personnes (nom) VALUES ('".$data["nom"]."')";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo true;
	} else {
	    echo  false ;
	}	
}



function deletePersonne($data){
	global $conn;
	

	$sql = " DELETE FROM personnes WHERE id_perso=".$data['id_perso'][0];
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo true;
	} else {
	    echo  $sql ;
	}	
}

 

function updatePersonne($data){
	global $conn;
	

	$sql = " UPDATE personnes SET nom = '".$data['nom']."' WHERE id_perso=".$data['id_perso'][0];
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo true;
	} else {
	    echo  $sql ;
	}	
}


function getDoc(){
	global $conn;
	$tab_returned = array();
	$sql = "SELECT * FROM documents ";
	//echo $sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$tab_returned[] = $row;

					
		}
		echo json_encode($tab_returned);
		return;

	
	} else {
		return http_response_code(500);
	}	
}



function getPersonne(){
	global $conn;
	$tab_returned = array();
	$sql = "SELECT * FROM personnes ";
	//echo $sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$tab_returned[] = $row;

					
		}
		echo json_encode($tab_returned);
		return;

	
	} else {
		return http_response_code(500);
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


function getScore(){
	global $conn;
	$tab_returned =  array();


	$sql = "SELECT documents.nom, scores.distance FROM documents LEFT JOIN scores ON documents.id_doc = scores.id_doc WHERE scores.distance!=0 ORDER BY scores.distance DESC ";
	//echo $sql;
	$result = $conn->query($sql);
	if ($result->num_rows!=null) {
		while($row = $result->fetch_assoc()) {
			
			$tab_returned[]=$row;
					
		}
		
		echo json_encode($tab_returned);
		return;

	} else {
		echo $sql;
		return;

	}	
}


function getCoords($id){
	global $conn;
	$tab_returned = array();
	$sql = "SELECT * FROM coords where id_doc='".$id."'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$tab_returned[] = $row;

					
		}
		echo json_encode($tab_returned);
		return;

	
	} else {
		return http_response_code(500);
	}	
}


/*
function getCoords(){
	global $conn;
	$tab_returned = array();
	$sql = "SELECT * FROM coords ";
	//echo $sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$tab_returned[] = $row;
			
			
		}

	return echo json_encode($tab_returned);	
	} else {
		return http_response_code(404);
	}	
	
}
*/


$conn->close();
