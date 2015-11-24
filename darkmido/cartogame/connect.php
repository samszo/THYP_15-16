<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thyp_cartogame";

global $conn;

try {

  # MySQL with PDO_MYSQL
  $DBH = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

}
catch(PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}


?>