<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "personne":
		selectpersonne($_GET);
		break;
	case "colis":
		selectcolis($_GET);
		break;	
	default:
		;
	break;
}

function selectpersonne($data){

	$sql = "SELECT * FROM personne";
	$result = $conn->query($sql);
	//echo $sql;
	if ($result->num_rows > 0) {
    // output data of each row
	
	    while($row = $result->fetch_assoc()) {
	        echo json_encode($row);
	    }
	} else {
    	echo "0 results";
	}	
}

function selectcolis($data){
	global $conn;
	
	$sql = "SELECT * FROM colis where id_personne =".$data["id_personne"];
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo json_encode($row);
			
		}
	}
}
$conn->close();