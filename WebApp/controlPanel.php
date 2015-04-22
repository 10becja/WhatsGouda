<?php include "./backEnd/base.php"; ?>
<?php include "navbar.php"; ?>

<?php
	$username = $_SESSION['username'];

	$query = 'SELECT * FROM Recipe where creatorUsername = "'. $username .'"';
	$result = mysql_query($query);
?>
	<div>
	<h1>Your Recipes:</h1>
	<!-- TODO: Add links to addRecipe and deleteRecipe here -->
	<table class="table table-striped table-hover table-bordered">
	<tr>
		<th>Quality</th>
		<th>Difficulty</th>
		<th>Reviews</th>
		<th>Name</th>
	</tr>
<?php
	$row = mysql_fetch_array($result);
	while ($row) 
	{
		echo "
		<tr>
			<td>" . $row['avgQuality'] . "</td>
			<td>" . $row['avgDifficulty'] . "</td>
			<td>" . $row['reviewCount'] . "</td>
			<td><a href='viewRecipe.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></td>
		</tr>";
		$row = mysql_fetch_array($result);
	}
	echo "</table>";
	echo "</div>";

	$query = 'SELECT Ingredient.name AS ingredientName, Ingredient.id as ingredientID FROM Has, Ingredient WHERE Has.username="' . $username . '" AND Ingredient.id=Has.ingredientID';
	$result = mysql_query($query);
	//TODO: Add links to addIngredient and deleteIngredient here
	echo "<div>";
	echo "<h1>Your Ingredients:</h1>";
	echo "<ul>";
	while($row = mysql_fetch_array($result)) {
		echo "<li>" . $row['ingredientName'] . "</li>";
	}
	echo "</ul>";
	echo "</div>";


?>


<input class="btn btn-primary" type="button" value="What Can I Make?" onclick="location='recommend.php'" />

	</div>
  </body>
</html>
