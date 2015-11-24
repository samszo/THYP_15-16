<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "score":
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
	break;
}

function createScore($data){
	global $DBH;
	
	try {

		$stmt = $DBH->prepare("INSERT INTO scores(id_perso, id_doc, distance, maj)
			VALUES (? , ?, ?, NOW())");
		$stmt->bindParam(1, $id_perso);
		$stmt->bindParam(2, $id_doc);
		$stmt->bindParam(3, $distance);

		// insertion d'un score
		$id_perso = $data["id_perso"];
		$id_doc = $data["id_doc"];
		$distance = $data["distance"];
		
		$stmt->execute();

		echo 'Score inserted';	

	}
	catch(PDOException $e) {
		echo 'Erreur : ' . $e->getMessage();
	}
}

function createPersonne($data){
	global $DBH;

	try {

		$stmt = $DBH->prepare('SELECT * FROM personnes WHERE nom = ?');
		$stmt->bindParam(1, $data["nom"]);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!$row)
		{
			$stmt = $DBH->prepare("INSERT INTO personnes(nom) VALUES (?)");
			$stmt->bindParam(1, $nom);

		// insertion d'une personne
			$nom = $data["nom"];
			$stmt->execute();
		}

	}
	catch(PDOException $e) {
		echo 'Erreur : ' . $e->getMessage();
	}
}

function createDocument($data){
	global $DBH;
	
	try {

		$stmt = $DBH->prepare("INSERT INTO documents(nom, latlng, url)
			VALUES (? , PointFromText(?), ?)");
		$stmt->bindParam(1, $nom);
		$stmt->bindParam(2, $latlng);
		$stmt->bindParam(3, $url);

		// insertion d'un document
		$nom = $data["nom"];
		$latlng = 'POINT('.$data["latlng"].')';
		$url = $data["url"];
		$stmt->execute();

		echo 'Document inserted';	

	}
	catch(PDOException $e) {
		echo 'Erreur : ' . $e->getMessage();
	}
}



