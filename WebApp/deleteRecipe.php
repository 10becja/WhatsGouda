<?php
include "db.php";
function deleteRecipe($name){
	$sql = "DELETE FROM MyGuests WHERE name='$name'";
	
	$result = mysql_query($sql);
	if(! $result ){
		die('Could not enter data: ' . mysql_error());
	}
	echo "Successfully deleted the recipe!\n";

	
	
}

//deleteRecipe("bread");


?>