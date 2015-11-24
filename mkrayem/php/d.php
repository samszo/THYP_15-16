<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "scores":
		deleteScores($_GET);
		break;
	case "personnes":
		deletePersonnes($_GET);
		break;
	case "documents":
		deleteDocuments($_GET);
		break;		
	default:
		;
	break;
}
// delete data scores
function deleteScores($data){
	$sql = "DELETE FROM MyGuests WHERE id=3";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
}
// delete data personnes
function deletePersonnes($data){
	 $sql = "DELETE FROM MyGuests WHERE id=3";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
}

// delete data document
function deleteDocuments($data){
	 $sql = "DELETE FROM MyGuests WHERE id=3";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
}



?>