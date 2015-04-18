<?php
include "db.php";
function createReview($id, $difficulty, $quality, $body, $voteDifference, $writerUsername, $recipeID){
	$sql = "INSERT INTO Review VALUES ('$id', '$difficulty', '$quality', '$body', '$voteDifference', '$writerUsername', '$recipeID');";
	
	$result = mysql_query($sql);
	
	if(! $result ){
		die('Could not enter data: ' . mysql_error());
	}
	echo "Successfully added the review!\n";

	
	
}



?>
