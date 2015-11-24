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
		readDocument($_GET);
<<<<<<< HEAD
		break;
	case "personnes":
		readPersonnes($_GET);
		break;
	case "scores":
		readScores($_GET);
=======
>>>>>>> 9e153ffed5a0d48366ce91bef18953ff10186e46
		break;		
	default:
		;
	break;
}

function readScore($data){
	global $conn;
	
	$sql = "SELECT * FROM scores where  id_scores";
	//echo $sql."<br>";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
<<<<<<< HEAD
		echo json_encode($row);	
		}

=======
			echo "id_score: " . $row["id_scores"]." id_perso: " . $row["id_perso"]." id_doc: " . $row["id_doc"]." distance: " . $row["distance"]."<br>";
		}
		//echo "score selected successfully";
>>>>>>> 9e153ffed5a0d48366ce91bef18953ff10186e46
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

<<<<<<< HEAD
function readScores($data){
	global $conn;
	
	$sql = "SELECT * FROM scores";
=======
function readPersonne($data){
	global $conn;
	
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 7fd687aed84af6cbdcfad5b317a28b17171a28c3
	$sql = "SELECT * FROM personnes where  id_perso";
>>>>>>> 9e153ffed5a0d48366ce91bef18953ff10186e46
	//echo $sql."<br>";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
<<<<<<< HEAD
		echo json_encode($row);	
		}

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function readPersonne($data){
	global $conn;
	
	$sql = "SELECT * FROM personnes where  nom = '". $data["nom"]."'";
	//echo $sql."<br>";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc(); 
		 echo json_encode($row);
<<<<<<< HEAD
>>>>>>> b446527977cd3b7e3b79c13ffa7aed0f3e22e20e
=======
>>>>>>> 7fd687aed84af6cbdcfad5b317a28b17171a28c3
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function readPersonnes($data){
	global $conn;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 7fd687aed84af6cbdcfad5b317a28b17171a28c3
	
	$sql = "SELECT * FROM personnes";
	//echo $sql."<br>";
	$result = $conn->query($sql);
	if ($result && $result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
		$tab1[] = $row; 
}
		 echo json_encode($tab1);
=======
			echo "id_perso: " . $row["id_perso"]."  joueur: " . $row["nom"]."<br>";
		}
		//echo "score selected successfully";
>>>>>>> 9e153ffed5a0d48366ce91bef18953ff10186e46
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function readDocument($data){
	global $conn;
<<<<<<< HEAD
	$tab = array(); 
	
	$sql = "SELECT id_doc, nom, ST_AsText(latlng), url FROM documents";
	// echo $sql."<br>";
	$latlng = "ST_AsText(latlng)";
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

		$coord = $row[$latlng];
		preg_match('#\((.*?)\)#', $coord, $matches);

        $espace = strrpos($matches[1], ' ');
		
		$row["lat"] = substr($matches[1], 0, $espace);
		
		$row["lng"] = substr($matches[1], $espace);

		unset($row["ST_AsText(latlng)"]);

		array_push($tab, $row);
		shuffle($tab);
		}
		 echo json_encode($tab);


<<<<<<< HEAD
>>>>>>> b446527977cd3b7e3b79c13ffa7aed0f3e22e20e
=======
=======
	
	$sql = "SELECT * FROM documents where id_doc";
	echo $sql."<br>";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$id_doc = "id_doc";
			$nom = "nom";
			$url = "url";
			print '<tr>
            <td>
			<img name="myimage" src="'.$row[$url].'" width="60" height="60" alt="word" />
			 </td>
          </tr>';

			echo "id_doc: " . $row[$id_doc]. " monument: " . $row[$nom]." image : " . $row[$url]."<br>";
		}
		//echo "score selected successfully";
>>>>>>> 9e153ffed5a0d48366ce91bef18953ff10186e46
>>>>>>> 7fd687aed84af6cbdcfad5b317a28b17171a28c3
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

$conn->close();
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 9e153ffed5a0d48366ce91bef18953ff10186e46
