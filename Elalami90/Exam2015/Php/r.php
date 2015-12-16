<?php
include_once 'connect.php';

switch ($_GET["table"]) {

	case "personne":
		readperso();
		break;
	case "colis":
		readColis($_GET);
		break;		
	default:
		;
	break;
}

function readperso(){
	global $conn;
	
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

function readColis($data){
	global $conn;
	
	$sql = "SELECT * FROM colis where idpersonne =".$data["idpersonne"];
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo json_encode($row);
			
		}
	}
}





$conn->close();
