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

//selection   scores
	function selectScores($data){
	global $conn;
		$sql = "SELECT * FROM scores WHERE id_perso ='".$data["id_perso"]."' ";
		
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<br> id: " . $row["id"]. " distance: " . $row["distance"]. " id_doc" . $row["id_doc"]. "<br>";
			}
		} else {
			echo "0 resultat";
		}
}


		//selection  documents   
		function selectDocuments($data){
			
			global $conn;
			$sql =  "SELECT * FROM documents ";
			$result = $conn->query($sql);
		
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<br> id: " . $row["id_doc"]. " nom_doc: " . $row["nom_doc"]. " lating" . $row["lating"]. "<br>";
				}
			} else {
				echo "0 resultat";
			}
}


$conn->close();
?>