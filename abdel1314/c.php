<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "score":
<<<<<<< HEAD
	createScore($_GET);
	break;
	case "personne":
	createPersonne($_GET);
	break;
	case "document":
	createDocument($_GET);
	break;		
	default:
	;
=======
		createScore($_GET);
		break;
	case "personne":
		createPersonne($_GET);
		break;
	case "document":
		createDocument($_GET);
		break;		
	default:
		;
>>>>>>> 9e153ffed5a0d48366ce91bef18953ff10186e46
	break;
}

function createScore($data){
	global $conn;
	
	$sql = "INSERT INTO scores (id_doc, id_perso, distance, maj)
	VALUES (".$data["id_doc"].", ".$data["id_perso"].", ".$data["distance"].",NOW())";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    //echo "New record created successfully";
	} else {
<<<<<<< HEAD
		echo "Error: " . $sql . "<br>" . $conn->error;
=======
	    echo "Error: " . $sql . "<br>" . $conn->error;
>>>>>>> 9e153ffed5a0d48366ce91bef18953ff10186e46
	}	
}
function createPersonne($data){
	global $conn;
<<<<<<< HEAD
	$sql = "SELECT * FROM personnes where  nom = '". $data["nom"]."'";
	$result = $conn->query($sql);
	if ($result->num_rows == 0) {
		
		$sql = "INSERT INTO personnes (nom)
		VALUES ('".$data["nom"]."')";
		echo "New record has id: " . mysqli_insert_id($conn);
	//echo $sql;
		if ($conn->query($sql) === TRUE) {
	    //echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}	
		
	}



	
=======
	
	$sql = "INSERT INTO personnes (nom)
	VALUES ('".$data["nom"]."')";
	echo "New record has id: " . mysqli_insert_id($conn);
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    //echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
>>>>>>> 9e153ffed5a0d48366ce91bef18953ff10186e46

}

// function createDocument($data){
// 	global $conn;
<<<<<<< HEAD

=======
	
>>>>>>> 9e153ffed5a0d48366ce91bef18953ff10186e46
// 	$sql = "INSERT INTO documents (nom, latlng, url)
// 	VALUES (".$data["nom"].", ".$data["latlng"].", ".$data["url"].")";
// 	//echo $sql;
// 	if ($conn->query($sql) === TRUE) {
// 	    //echo "New record created successfully";
// 	} else {
// 	    echo "Error: " . $sql . "<br>" . $conn->error;
// 	}	
<<<<<<< HEAD

=======
	
>>>>>>> 9e153ffed5a0d48366ce91bef18953ff10186e46
// }

$conn->close();
?>