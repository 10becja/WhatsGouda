<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
	$username = $_SESSION['username'];
	$sql = "SELECT hashas.username, Recipe.name AS RecommendRecipe, Recipe.id as recipeID
			FROM hashas, Recipe, reqreq
			WHERE reqreq.recipeID = Recipe.id 
						AND FIND_IN_SET(reqreq.ingredientid, hashas.ingredientid) > 0;";
	
	//echo $sql;
	$result = mysql_query($sql);
	
	echo '<table class="table table-striped table-hover table-bordered">';
	
	echo "<tr><th>" ."RecommendRecipe". "</th></tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr><td><a href='./viewRecipe.php?id=" . $row['recipeID'] . "'>" . $row['RecommendRecipe'] . "</a></td></tr>";
	}        
 

?>

