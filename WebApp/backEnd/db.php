<?php
$dbhost = "illinidev.net:3306";
$dbuser = "gouda";
$dbpass = "cs411goudapassword";
$dbname = "gouda";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "\n";


?>