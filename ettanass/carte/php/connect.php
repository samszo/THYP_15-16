<?php
$servername = "localhost";
$username = "root";
$password = "";
<<<<<<< HEAD
$dbname = "aaa";
=======
$dbname = "ettanass";
>>>>>>> 0f7cf5275de3ab5cb70ab79626b1a3685e32bc67

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
?>
