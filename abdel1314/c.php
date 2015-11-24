<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "score":
<<<<<<< HEAD
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
=======
>>>>>>> 7fd687aed84af6cbdcfad5b317a28b17171a28c3
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
<<<<<<< HEAD
>>>>>>> b446527977cd3b7e3b79c13ffa7aed0f3e22e20e
=======
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
>>>>>>> 7fd687aed84af6cbdcfad5b317a28b17171a28c3
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
<<<<<<< HEAD
	    echo "Error: " . $sql . "<br>" . $conn->error;
=======
		echo "Error: " . $sql . "<br>" . $conn->error;
>>>>>>> b446527977cd3b7e3b79c13ffa7aed0f3e22e20e
=======
		echo "Error: " . $sql . "<br>" . $conn->error;
=======
	    echo "Error: " . $sql . "<br>" . $conn->error;
>>>>>>> 9e153ffed5a0d48366ce91bef18953ff10186e46
>>>>>>> 7fd687aed84af6cbdcfad5b317a28b17171a28c3
	}	
}
function createPersonne($data){
	global $conn;
<<<<<<< HEAD
<<<<<<< HEAD
	
	$sql = "INSERT INTO personnes (nom)
	VALUES ('".$data["nom"]."')";
	echo "New record has id: " . mysqli_insert_id($conn);
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    //echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
=======
=======
>>>>>>> 7fd687aed84af6cbdcfad5b317a28b17171a28c3
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



	
<<<<<<< HEAD
>>>>>>> b446527977cd3b7e3b79c13ffa7aed0f3e22e20e
=======
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
>>>>>>> 7fd687aed84af6cbdcfad5b317a28b17171a28c3

}

// function createDocument($data){
// 	global $conn;
<<<<<<< HEAD
<<<<<<< HEAD
	
=======

>>>>>>> b446527977cd3b7e3b79c13ffa7aed0f3e22e20e
=======

=======
	
>>>>>>> 9e153ffed5a0d48366ce91bef18953ff10186e46
>>>>>>> 7fd687aed84af6cbdcfad5b317a28b17171a28c3
// 	$sql = "INSERT INTO documents (nom, latlng, url)
// 	VALUES (".$data["nom"].", ".$data["latlng"].", ".$data["url"].")";
// 	//echo $sql;
// 	if ($conn->query($sql) === TRUE) {
// 	    //echo "New record created successfully";
// 	} else {
// 	    echo "Error: " . $sql . "<br>" . $conn->error;
// 	}	
<<<<<<< HEAD
<<<<<<< HEAD
	
=======

>>>>>>> b446527977cd3b7e3b79c13ffa7aed0f3e22e20e
=======

=======
	
>>>>>>> 9e153ffed5a0d48366ce91bef18953ff10186e46
>>>>>>> 7fd687aed84af6cbdcfad5b317a28b17171a28c3
// }

$conn->close();
?>