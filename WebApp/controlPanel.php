<?php include "./backEnd/base.php"; ?>
<?php include "navbar.php"; ?>

<?php
	$username = $_SESSION['username'];

	$query = 'SELECT * FROM Recipe where creatorUsername = "'. $username .'"';
	$result = mysql_query($query);
?>
	<div>
	<h1>Your Recipes:</h1>
	<p>Want to make a new recipe? <a href="./addRecipe.php">Add one here!</a> Want to get rid of one? <a href="./deleteRecipe.php">Delete it!</a></p>
	<table class="table table-striped table-hover table-bordered">
	<tr>
		<th>Name</th>
		<th>Quality</th>
		<th>Difficulty</th>
		<th>Reviews</th>
		<th>Edit Link</th>
	</tr>
<?php
	$row = mysql_fetch_array($result);
	while ($row) 
	{
		echo "
		<tr>
			<td><a href='viewRecipe.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></td>
			<td>" . number_format((float)$row['avgQuality'], 2, '.', '') . "</td>
			<td>" . number_format((float)$row['avgDifficulty'], 2, '.', '') . "</td>
			<td>" . $row['reviewCount'] . "</td>
			<td><a href='editRecipe.php?id=" . $row['id'] . "'>Edit this recipe!</a></td>
		</tr>";
		$row = mysql_fetch_array($result);
	}
	echo "</table>";
	echo "</div>";

	$query = 'SELECT Ingredient.name AS ingredientName, Ingredient.id as ingredientID FROM Has, Ingredient WHERE Has.username="' . $username . '" AND Ingredient.id=Has.ingredientID';
	$result = mysql_query($query);
	echo "<div>";
	echo "<h1>Your Ingredient Basket:</h1>";
	echo "<ul>";
		while($row = mysql_fetch_array($result)) 
		{
		echo "<li>" . $row['ingredientName'] . "</li>";
	}
	echo "</ul>";

	echo "</br>";
	echo "<p>Got new ingredients in the pantry or fridge? <a href='./addIngredient.php'>Add them!</a> Don't have ingredients anymore? <a href='./deleteIngredient.php'>Remove them.</a></p>";

	echo "<p><b><i>Your basket will be saved between sessions.</b></i></p>";
	echo "</div>";


?>


<input class="btn btn-primary" type="button" value="What Can I Make?" onclick="location='recommend.php'" />
<input class="btn btn-primary" type="button" value="Looking for other Users?" onclick="location='searchUsers.php'" />

	</div>
  </body>
</html>
