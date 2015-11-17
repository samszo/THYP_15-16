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
		readDocuments();
		break;		
	default:
		;
	break;
}







function readScore(){
	global $conn;
	
	$sql = "SELECT * FROM scores WHERE id_scores =".$data["id_score"];
	echo $sql."<br>";
	$result = $conn->query($sql);

	if ($result!=null && $result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "id_score: " . $row["id_scores"]. " id_perso: " . $row["id_perso"]." id_doc: " . $row["id_doc"]."<br>";
		}
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}




function readPersonne(){
	global $conn;
	
	$sql = "SELECT * FROM personnes WHERE ( id_perso =".$data["id_perso"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "personne readed successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}


//
function readDocuments(){
	global $conn;
	$list= array();
	$sql = "SELECT id_doc, nom,X(latlng)  lat,Y(latlng)  lng , url FROM documents";
	//echo $sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$list[] = json_encode($row);
			

		}
		
	echo json_encode($list);
	}
}



$conn->close();