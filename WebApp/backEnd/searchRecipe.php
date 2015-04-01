<?php
include "db.php";
function searchRecipe($connection, $qry){
	$sql = "SELECT * FROM Recipe WHERE name LIKE '$qry%'";
	$result = $connection->query($sql);
	if (!$result) { 
		die('Invalid query: ' . mysql_error());
	}

	echo "<table>";

	if ($result->num_rows > 0){
	    echo "<tr><td>" . "avgQuality" . "</td><td>" . "avgDifficulty" . "</td><td>" . "reviewCount" . "</td><td>" . "name" . "</td><td>" . "creatorUsername" . "</td></tr>";
		while($row = $result->fetch_array()){
			echo "<tr><td>" . $row['avgQuality'] . "</td><td>" . $row['avgDifficulty'] . "</td><td>" . $row['reviewCount'] . "</td><td>" . $row['name'] . "</td><td>" . $row['creatorUsername'] . "</td></tr>";
			
		}        
	}
	
}

searchRecipe($conn, "pizz");



?>