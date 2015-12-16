<?php
include_once 'connect.php';



switch ($_GET["table"]) {
	case "colis":
		getColis($_GET["idPersonne"]);
		break;		
	case "personne":

		getPersonne();
		break;

	}




function getPersonne(){
	global $conn;
	$tab_returned = array();

	$sql = "SELECT * FROM personne ";
	//echo $sql;
	

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$tab_returned[] = $row;

					
		}

		echo json_encode($tab_returned);
		return;

	
	} 	
}


function getColis($id){
	global $conn;
	$tab_returned = array();
	$sql = "SELECT * FROM colis WHERE id_personne=".$id;
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



$conn->close();
?>