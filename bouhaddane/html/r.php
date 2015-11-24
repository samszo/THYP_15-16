<?php 
include_once '../php/connect.php';


		readScore();
	
		readPersonne();

		readDocument();


function readScore(){
	global $conn;
	
	$sql = "SELECT * FROM scores";
	$result = $conn->query($sql);
	//echo $sql;
	if ($result->num_rows > 0) {
    // output data of each row
		echo "<h1>Table score</h1>";
	    while($row = $result->fetch_assoc()) {
	        echo "id: " . $row["id_scores"]. " - id perso: " . $row["id_perso"]. " - id doc " . $row["id_doc"]. " - distance " . $row["distance"]. " - maj " . $row["maj"]."<br>";
	    }
	} else {
    	echo "0 results";
	}	
}

function readPersonne(){
	global $conn;
	
	$sql = "SELECT * FROM personnes";
	$result = $conn->query($sql);
	//echo $sql;
	if ($result->num_rows > 0) {
    // output data of each row
		echo "<h1>Table personnes</h1>";
	    while($row = $result->fetch_assoc()) {
	        echo "id: " . $row["id_perso"]. " - Nom : " . $row["nom"]. "<br>";
	    }
	} else {
    	echo "0 results";
	}	
}

function readDocument(){
	global $conn;
	
	$sql = "SELECT id_doc,nom, AsText(`latlng`), url FROM documents";
	$result = $conn->query($sql);
	//echo $sql;
	if ($result->num_rows > 0) {
    // output data of each row
		echo "<h1> Table documents</h1>";
	    while($row = $result->fetch_assoc()) {
	        echo "id: " . $row["id_doc"]. " - Nom : " . $row["nom"]." - LatLng : " . $row["AsText(`latlng`)"]." - URL : " . $row["url"] . "<br>";
	    }
	} else {
    	echo "0 results";
	}	
}



$conn->close();

?>