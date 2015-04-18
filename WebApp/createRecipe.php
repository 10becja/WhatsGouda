<?php
include "db.php";
function createRecipe($id, $avgQuality, $avgDifficulty, $reviewCount, $name, $creatorUsername, $body){
	$sql = "INSERT INTO Recipe VALUES ('$id', '$avgQuality', '$avgDifficulty', '$reviewCount', '$name', '$creatorUsername', '$body');";
	
	$result = mysql_query($sql);
	if(! $result ){
		die('Could not enter data: ' . mysql_error());
	}
	echo "Entered recipe successfully\n";

	
	
}

//createRecipe("15", "1.1", "5.2", "5", "bread", "yuchen", "NULL");


?>
