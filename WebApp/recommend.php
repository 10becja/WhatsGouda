<?php
	include "db.php";
	session_start();
	$username = $_SESSION['username'];
	$sql = "SELECT User.username, Recipe.name AS RecommendRecipe
			FROM Recipe, Ingredient, Requires, Has, User
			WHERE Recipe.id = Requires.recipeID 
						AND Requires.ingredientID = Ingredient.id 
						AND Has.username = User.username 
						AND User.username = '%$username%'
						AND Has.ingredientID = Ingredient.id;";
	
	$result = mysql_query($sql);
	
	echo '<table class="table table-striped table-hover table-bordered">';
	
	echo "<tr><th>" ."RecommendRecipe". "</th></tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr><td>" .$row['RecommendRecipe'] . "</td></tr>";
	}        
 

?>

