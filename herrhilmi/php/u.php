<?php
include_once 'connect.php';

$table = isset($_GET["table"]) ? $_GET["table"] : $_POST["table"];

switch ($table) {
	case "score":
		updateScore($_GET);
		break;
	case "personne":
		updatePersonne($_GET);
		break;
	case "document":
		updateDocument($_GET);
		break;	
	case "personnesw2ui":
		updatePersonnesForW2UIGrid();
		break;
	default:
	break;
}

function updateScore($data){
	global $conn;
	$sql = "update scores set distance=".$data["distance"].", maj = NOW() where id_scores =".$data["id_score"];

	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "score updated successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function updatePersonne($data){
	global $conn;
	
	$sql = "update personnes set nom= ".$data["nom"]." where id_perso=".$data["id_perso"];
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "personne updated successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function updateDocument($data){
	global $conn;
	// should format latlng in js
	$sql = "update documents set nom= ".$data["nom"]." latlng=".$data["latlng"]." url=".$data["url"]." where  id_doc =".$data["id_doc"];
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "document updated successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function updatePersonnesForW2UIGrid()
{
	global $conn;
	$list = array();
	
	$changes = $_GET["data"];
	$sql = "update personnes set ";
	
	foreach($changes as $k => $val)
	{
<<<<<<< HEAD
		if($k!="recid")
			$sql .= $k ." = '".$val."',";		
=======
		
		$sql = "update personnes set nom = '".$row["nom"]."'  where id_perso = ".$row["recid"];
		
		$conn->query($sql);
		$list[] = $row;
>>>>>>> origin/master
	}
	$sql = substr($sql, 0, -1);
	$sql .= " WHERE id_perso = ".$changes["recid"];
	//echo $sql;
	$conn->query($sql);
	
	echo json_encode(array("message"=>"Modification effectuée"));
	
	
}

$conn->close();
