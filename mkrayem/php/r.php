<?php
include_once 'connect.php';
if (isset($_GET["table"]))
{
          $table = $_GET['table'];
		  
}
switch ($_GET["table"]) {
	case "scores":
		selectScores($_GET);
		break;
	case "personnes":
		selectPersonnes($_GET);
		break;
	case "documents":
		selectDocuments($_GET);
		break;		
	default:
		;
	break;
}

//selection data  scores
function selectScores($data){
	global $conn;
	//$select =  "SELECT * FROM scores WHERE id_doc ='$id_doc' ";
$sql = "SELECT * FROM scores WHERE id_doc ='$id_doc' ";

$id_doc = $rows['id_doc'];
$id_perso = $rows['id_perso'];
$distance = $rows['distance'];
$maj = $rows['maj'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " id_perso " . $row["id_perso"]. "distance: " . $row["distance"]. "maj: " . $row["maj"]. "<br>";
    }
} else {
    echo "0 results";
}
}

//selection data personnes  id_perso, nom
function selectPersonnes($data){
	global $conn;
	$select =  "SELECT * FROM personnes WHERE id_perso ='$id_perso' ";

$id_perso = $rows['id_perso'];

$nom = $rows['nom'];
}
//selection data documents   id_doc, nom,lating,url
function selectDocuments($data){
	global $conn;
	$select =  "SELECT * FROM documents WHERE id_doc ='$id_doc' ";

$id_doc = $rows['id_doc'];

$nom = $rows['nom'];
$lating = $rows['lating'];
$url = $rows['url'];
}


$conn->close();
?>