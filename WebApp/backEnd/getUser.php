<?php
include "db.php";
function getUser($connection, $username){
	//$sql = "SELECT ".$username." From User";
	$sql = "SELECT * FROM User";
	$result = $connection->query($sql);
	if (!$result) { 
		die('Invalid query: ' . mysql_error());
	}

	echo "<table>";

	if ($result->num_rows > 0){	
		echo "<tr><td>" . "username" . "</td><td>" . "email" . "</td><td>" . "title" . "</td></tr>";
		while($row = $result->fetch_array()){
			echo "<tr><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td><td>" . $row['title'] . "</td></tr>";
			
		}        
	}
	
}

getUser($conn, "*");



?>