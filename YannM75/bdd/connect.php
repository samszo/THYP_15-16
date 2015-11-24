<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thyp_cartogame";

// Create connection
		try{
			$conn = new PDO('mysql:host=localhost;dbname='.$dbname.';charset=utf8', 'root', '');
		}catch(Exception $e){
			echo 'error';
			die('Erreur : '.$e->getMessage());
		}
		
echo "Connected successfully";

?>

