<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "score":
		selectScore($_GET);
		break;
	case "scores":
		// get score of a member
		selectScores($_GET);
		break;
	case "personne":
		selectPersonne($_GET);
		break;
	case "allscores":
		selectAllScores();
		break;
	case "personnes":
		selectPersonnes();
		break;
	case "document":
		selectDocuments();
		break;	
	case "connect":
		connect($_GET);
		break;	
	case "personnesw2ui":
		selectPersonnesForW2UIGrid();
		break;
	case "documentsw2ui":
		selectDocumentsForW2UIGrid();
		break;
	case "scoresw2ui":
		selectScoresForW2UIGrid();
		break;
	default:
		;
	break;
}

function selectScore($data){
	global $conn;
	
	$sql = "SELECT * FROM scores where id_doc =".$data["id_doc"]." AND id_perso=".$data["id_perso"];
	//echo $sql."<br>".$result->num_rows."<br>";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo json_encode($row);
		}
	} else {
	   echo "";
	}	
}

function selectScores($data){
	global $conn;
	$list= array();
	$sql = "SELECT * FROM scores where id_perso=".$data["id_perso"];
	//echo $sql."<br>".$result->num_rows."<br>";
	$result = $conn->query($sql);
	if ($result && $result->num_rows) {
		while($row = $result->fetch_assoc()) {
			$list[] = $row;
		}
		echo json_encode($list);
	} else {
	    echo "";
	}	
	
}

function selectPersonne($data){
	global $conn;
	
	$sql = "SELECT * FROM personnes where id_perso =".$data["id_perso"];
	//echo $sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo json_encode($row);
			return;
		}
	}
}

function selectAllScores(){
	global $conn;
	$list= array();
	$sql = "SELECT * FROM scores";
	$result = $conn->query($sql);
	
	//echo $sql."<br>".$result->num_rows."<br>";
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			//print_r($row);
			$list[] = $row;
		}
		echo json_encode($list);
	}
}

function selectPersonnes(){
	global $conn;
	$list= array();
	$sql = "SELECT * FROM personnes";
	$result = $conn->query($sql);
	
	//echo $sql."<br>".$result->num_rows."<br>";
	if ($result && $result->num_rows) {
		while($row = $result->fetch_assoc()) {
			$list[] = $row;
		}
		echo json_encode($list);
	}
}

function selectDocuments(){
	global $conn;
	$list= array();
	$sql = "SELECT id_doc, nom,  X(latlng) lat, Y(latlng) lng , url FROM documents";
	$result = $conn->query($sql);
	
	//echo $sql."<br>".$result->num_rows."<br>";
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			//print_r($row);
			$list[] = $row;
		}
		echo json_encode($list);
	}
}

function connect($data){
	global $conn;
	
	$sql = "SELECT * FROM personnes where nom ='".$data["github"]."'";
	//echo $sql;
	$result = $conn->query($sql);
	
	if ($result && $result->num_rows) {
		while($row = $result->fetch_assoc()) {
			echo json_encode($row);
		}	
	} else {
		return http_response_code(500);
	}	
	
}

// W2ui get functions
function selectPersonnesForW2UIGrid(){
	global $conn;
	$list= array();
	$records= array();
	
	$sql = "SELECT * FROM personnes";
	$result = $conn->query($sql);
	
	//echo $sql."<br>".$result->num_rows."<br>";
	if ($result && $result->num_rows) {
		$list["status"] = "success";
		$list["total"] = $result->num_rows;
		while($row = $result->fetch_assoc()) {
			$grid_row = array();
			$grid_row["recid"] = $row["id_perso"];
			$grid_row["text"]= $row["nom"];
			$grid_row["check"] = false;
			$records[] = $grid_row;
		}
		
		$list["records"] = $records;
		echo json_encode($list);
	}
}


function selectDocumentsForW2UIGrid(){
	global $conn;
	$list= array();
	$records= array();
	
	$sql = "SELECT id_doc, nom,  X(latlng) lat, Y(latlng) lng , url FROM documents";
	$result = $conn->query($sql);
	
	//echo $sql."<br>".$result->num_rows."<br>";
	if ($result && $result->num_rows) {
		$list["status"] = "success";
		$list["total"] = $result->num_rows;
		while($row = $result->fetch_assoc()) {
			$grid_row = array();
			$grid_row["recid"] = $row["id_doc"];
			$grid_row["text"]= $row["nom"];
			$grid_row["position"]=$row["lat"]." ".$row["lng"];
			$grid_row["url"]=$row["url"];
			$grid_row["check"] = false;
			$records[] = $grid_row;
		}
		
		$list["records"] = $records;
		echo json_encode($list);
	}
}
			
			
function selectScoresForW2UIGrid(){
	global $conn;
	$list= array();
	$records= array();
	
	$sql = "SELECT s.id_scores id_scores, p.nom github, d.nom nom_doc,s.distance distance, s.maj maj FROM scores s, personnes p, documents d where s.id_perso = p.id_perso and s.id_doc=d.id_doc";
	$result = $conn->query($sql);
	
	//echo $sql."<br>".$result->num_rows."<br>";
	if ($result && $result->num_rows) {
		$list["status"] = "success";
		$list["total"] = $result->num_rows;
		while($row = $result->fetch_assoc()) {
			$grid_row = array();
			$grid_row["recid"] = $row["id_scores"];
			$grid_row["text"]= $row["github"];
			$grid_row["document"]= $row["nom_doc"];
			$grid_row["distance"]= $row["distance"];
			$grid_row["time"]= $row["maj"];
			$grid_row["check"] = false;
			$records[] = $grid_row;
		}
		
		$list["records"] = $records;
		echo json_encode($list);
	}
}
			
$conn->close();
