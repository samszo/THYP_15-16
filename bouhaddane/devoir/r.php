<?php
include_once 'connect.php';
switch ($_GET["table"]) {
	case "envoi":
		readEnvoi($_GET);
		break;
	case "personne":
		readPersonne($_GET);
		break;
	case "colis":
		readColis($_GET);
		break;		
	default:
		;
	break;
}
function readEnvoi($data){
	global $conn;
	
	$sql = "SELECT * FROM envoi";
	$result = $conn->query($sql);
	//echo $sql;
	if ($result->num_rows > 0) {
    // output data of each row
		echo "<h1>Résultat Table envoi</h1>";
	    while($row = $result->fetch_assoc()) {
	        echo  " - id personne: " . $row["id_personne"]. " - id colis " . $row["id_colis"]. "<br>";
	    }
	} else {
    	echo "0 results";
	}	
}
function readPersonne($data){
	global $conn;
	
	$sql = "SELECT * FROM personne";
	$result = $conn->query($sql);
	//echo $sql;
	if ($result->num_rows > 0) {
    // output data of each row
		echo "<h1>Résultat Table personnes</h1>";
	    while($row = $result->fetch_assoc()) {
	        echo "id: " . $row["id_perso"]. " - Nom : " . $row["nom_personne"]. "<br>";
	    }
	} else {
    	echo "0 results";
	}	
}
function readColis($data){
	global $conn;
	
	$sql = "SELECT id_colis,libelle_colis, AsText(`latlng`), FROM colis";
	$result = $conn->query($sql);
	//echo $sql;
	if ($result->num_rows > 0) {
    // output data of each row
		echo "<h1>Résultat Table colis</h1>";
	    while($row = $result->fetch_assoc()) {
	        echo "id: " . $row["id_colis"]. " - Nom : " . $row["libelle_colis"]." - LatLng : " . $row["AsText(`latlng`)"] . "<br>";
	    }
	} else {
    	echo "0 results";
	}
}
$conn->close();