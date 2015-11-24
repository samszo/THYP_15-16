<?php

$id = intval($_REQUEST['id_doc']);

	$conn = @mysql_connect('127.0.0.1','root','');
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('elmounjide', $conn);
$sql = "delete from documents where id_doc=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>