<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();
	$conn = @mysql_connect('127.0.0.1','root','');
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('elmounjide', $conn);
	
	$rs = mysql_query("select count(*) from documents");
	//echo $rs;
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	$rs = mysql_query("select * from documents limit $offset,$rows");
	
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

	echo json_encode($result);

?>