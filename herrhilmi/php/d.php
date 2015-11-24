<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "scores":
		deleteScore($_GET);
		break;
	case "personne":
		deletePersonne($_GET);
		break;
	case "document":
		deleteDocument($_GET);
		break;	
	case "personnesw2ui":
		deletePersonnesForW2UIGrid();
		break;
	case "documentsw2ui":
		deleteDocumentsForW2UIGrid();
		break;
	case "scoresw2ui":
		deleteScoresForW2UIGrid();
		break;
	default:
		;
	break;
}

function deleteScore($data){
	global $conn;
	$count = $data["count"];
	$sql = "DELETE FROM scores where  id_scores ='".$data["id_0"]."'";
	
	if($count > 1){
		
		for($i = 1 ; $i < $count ; $i++){
		    $sql .=" OR id_scores ='".$data["id_$i"]."'";
		}
	}

	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "score deleted successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function deletePersonne($data){
	global $conn;
	
	$sql = "DELETE FROM personnes where ( id_perso =".$data["id_perso"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "personne deleted successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function deleteDocument($data){
	global $conn;
	
	$sql = "DELETE FROM documents where ( id_doc =".$data["id_doc"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "document deleted successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

// W2ui get functions
function deletePersonnesForW2UIGrid(){
	global $conn;
	$list= array();
	
	$sql = "DELETE FROM personnes where ";
	$action = (isset($_POST["cmd"])) ? $_POST["cmd"] : null;
	
	if($action!=null && $action ="delete-records")
	{
		$id_scores = $_POST["selected"];
		$sql .= " id_perso = $id_scores[0]";
		
		if(count($id_scores) > 1)
		{
			for($i = 1 ; $i < count($id_scores) ; $i++)
			{
				$sql .=" OR id_perso = $id_scores[$i] ";
			}
		}
		
		if ($conn->query($sql) === TRUE) 
		{	
			$list["status"] = "success";
			echo json_encode($list);
		} 
		else 
		{
			$list["status"] = "error";
			$list["message"] = "aucun element n'est supprimé";
			echo json_encode($list);
		}
	}
}


function deleteDocumentsForW2UIGrid(){
	global $conn;
	$list= array();
	
	$sql = "DELETE FROM documents where ";
	$action = (isset($_POST["cmd"])) ? $_POST["cmd"] : null;
	
	if($action!=null && $action ="delete-records")
	{
		$id_scores = $_POST["selected"];
		$sql .= " id_doc = $id_scores[0]";
		
		if(count($id_scores) > 1)
		{
			for($i = 1 ; $i < count($id_scores) ; $i++)
			{
				$sql .=" OR id_doc = $id_scores[$i] ";
			}
		}
		
		if ($conn->query($sql) === TRUE) 
		{	
			$list["status"] = "success";
			echo json_encode($list);
		} 
		else 
		{
			$list["status"] = "error";
			$list["message"] = "aucun element n'est supprimé";
			echo json_encode($list);
		}
	}
}
			
			
function deleteScoresForW2UIGrid(){
	global $conn;
	$list= array();
	
	$sql = "DELETE FROM scores where ";
	$action = (isset($_POST["cmd"])) ? $_POST["cmd"] : null;
	
	if($action!=null && $action ="delete-records")
	{
		$id_scores = $_POST["selected"];
		$sql .= " id_scores = $id_scores[0]";
		
		if(count($id_scores) > 1)
		{
			for($i = 1 ; $i < count($id_scores) ; $i++)
			{
				$sql .=" OR id_scores = $id_scores[$i] ";
			}
		}
		
		if ($conn->query($sql) === TRUE) 
		{	
			$list["status"] = "success";
			echo json_encode($list);
		} 
		else 
		{
			$list["status"] = "error";
			$list["message"] = "aucun element n'est supprimé";
			echo json_encode($list);
		}
	}
}

$conn->close();
