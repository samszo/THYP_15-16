<?php

$nom = htmlspecialchars($_REQUEST['nom']);
$latitude = htmlspecialchars($_REQUEST['lat']);
$longitude = htmlspecialchars($_REQUEST['lng']);
$url = htmlspecialchars($_REQUEST['url']);

	$conn = @mysql_connect('127.0.0.1','root','');
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('elmounjide', $conn);

$sql = "insert into documents(nom,lat,lng,url) values('$nom','$latitude','$longitude','$url')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'id' => mysql_insert_id(),
		'nom' => $nom,
		'latitude' => $latitude,
		'longitude' => $longitude,
		'url' => $url
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>