<?php
include "base.php";
include "../navbar.php"
function searchRecipe($qry){
	$sql = "SELECT * FROM Recipe WHERE name LIKE '$qry%'";
	
	$result = mysql_query($sql);

	echo "<table>";
	
	
	echo "<tr><td>" . "avgQuality" . "</td><td>" . "avgDifficulty" . "</td><td>" . "reviewCount" . "</td><td>" . "name" . "</td><td>" . "creatorUsername" . "</td></tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr><td>" . $row['avgQuality'] . "</td><td>" . $row['avgDifficulty'] . "</td><td>" . $row['reviewCount'] . "</td><td>" . $row['name'] . "</td><td>" . $row['creatorUsername'] . "</td></tr>";
			
	}        

	
}

searchRecipe($_POST["searchTerm"]);



?>