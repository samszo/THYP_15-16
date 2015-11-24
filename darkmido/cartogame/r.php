<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "score":
		createScore($_GET);
		break;
	case "personne":
		readPersonne($_GET);
		break;
	case "personnes":
		readAllPersonne($_GET);
		break;
	case "document":
		readDocument();
		break;		
	default:
		;
	break;
}

function readDocument(){
	global $DBH;
	$rows =array();

	try {

		$sth = $DBH->prepare("SELECT id_doc,nom,url,AsText(latlng) FROM documents");
		$sth->execute();
		while ($result = $sth->fetch(PDO::FETCH_ASSOC)){
			preg_match('#\((.*?)\)#', $result['AsText(latlng)'], $match);
			$result['lat']=  substr($match[1], 0, strpos($match[1], ' '));
			$result['lng']=  substr($match[1],strpos($match[1], ' '));
			unset($result['AsText(latlng)']);
			array_push($rows, $result);
		}		
		echo json_encode( $rows, JSON_UNESCAPED_UNICODE );
	}
	catch(PDOException $e) {
	    echo 'Erreur : ' . $e->getMessage();
	}
}

function readPersonne($data){
	global $DBH;
	$rows =array();

	try {

		$sth = $DBH->prepare("SELECT * FROM personnes WHERE nom= :nom");
		$sth->execute(array(':nom' => $data["nom"]));
		$rows =  $sth->fetchAll(PDO::FETCH_ASSOC);		
		echo json_encode( $rows, JSON_UNESCAPED_UNICODE );
	}
	catch(PDOException $e) {
	    echo 'Erreur : ' . $e->getMessage();
	}
}

function readAllPersonne($data){
	global $DBH;
	$rows =array();

	try {

		$sth = $DBH->prepare("SELECT * FROM personnes");
		$sth->execute();
		$rows =  $sth->fetchAll(PDO::FETCH_ASSOC);		
		echo json_encode( $rows, JSON_UNESCAPED_UNICODE );
	}
	catch(PDOException $e) {
	    echo 'Erreur : ' . $e->getMessage();
	}
}

?>