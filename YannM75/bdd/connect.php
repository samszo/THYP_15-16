<?php
include_once '../lib/toolKit.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thyp_cartogame";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//debug_to_console('Connected successfully');
?>