<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
	$username = $_SESSION['username'];
	$sql = "SELECT User.username, Recipe.id AS recipeID, Recipe.name AS RecommendRecipe
			FROM Recipe, Ingredient, Requires, Has, User
			WHERE Recipe.id = Requires.recipeID 
						AND Requires.ingredientID = Ingredient.id 
						AND Has.username = User.username 
						AND User.username = '$username'
						AND Has.ingredientID = Ingredient.id;";
	
	//echo $sql;
	$result = mysql_query($sql);
	
	echo '<table class="table table-striped table-hover table-bordered">';
	
	echo "<tr><th>" ."RecommendRecipe". "</th></tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr><td><a href='./viewRecipe.php?id=" . $row['recipeID'] . "'>" . $row['RecommendRecipe'] . "</a></td></tr>";
	}        
 

?>

