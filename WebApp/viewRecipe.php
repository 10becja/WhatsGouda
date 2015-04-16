<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
function printRecipe($recipe) {
	$recipeId = $recipe['id'];
	$body = $recipe['body'];
	$name = $recipe['name'];
	$creator = $recipe['creatorUsername'];
	echo "<h1> $name </h1>";
	echo "<h2> By $creator </h2>";
	echo "<h3> Ingredients Needed: </h3>";
	echo "<ul>";
	printIngredientNames($recipeId);
	echo "</ul>";
	echo "<h3>Instructions:</h3>";
	echo "<p>$body</p>";
}

function printIngredientNames($recipeId){
	$query = "SELECT * FROM Ingredient WHERE id IN (SELECT ingredientID as id FROM Requires WHERE recipeId=$recipeId)";
	//If anyone knows a more efficient query, replace this^
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)) {
		echo "<li>" . $row['name'] . "</li>";
	}
}

	$recipeId = $_GET["id"];
	$recipeQuery = "SELECT * FROM Recipe WHERE id=$recipeId";
	$recipeResult = mysql_query($recipeQuery);
	if($recipeRow = mysql_fetch_array($recipeResult)) {
		printRecipe($recipeRow);
	}
	else {
		echo "<h1>Recipe not found</h1>";
	}
?>
