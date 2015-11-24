<?php

$id = intval($_REQUEST['id_doc']);
$nom = htmlspecialchars($_REQUEST['nom']);
$latitude = htmlspecialchars($_REQUEST['lat']);
$longitude = htmlspecialchars($_REQUEST['lng']);
$url = htmlspecialchars($_REQUEST['url']);
	$conn = @mysql_connect('127.0.0.1','root','');
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('elmounjide', $conn);

$sql = "update documents set nom='$nom',lat='$latitude',lng='$longitude',url='$url' where id_doc=$id";
//echo $sql;
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'id' => $id,
		'nom' => $nom,
		'latitude' => $latitude,
		'longitude' => $longitude,
		'url' => $url
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>