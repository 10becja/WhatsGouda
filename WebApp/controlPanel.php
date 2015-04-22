<?php include "./backEnd/base.php"; ?>
<?php include "navbar.php"; ?>

<?php
	$username = $_SESSION['username'];

	$query = 'SELECT * FROM Recipe where creatorUsername = "'. $username .'"';
	$result = mysql_query($query);
?>
	<div>
	<h1>Your Recipes:</h1>
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

	$query = 'SELECT Ingredient.name AS ingredientName FROM Has, Ingredient WHERE Has.username="' . $username . '" AND Ingredient.id=Has.ingredientID';
	$result = mysql_query($query);
	echo "<div>";
	echo "<h1>Your Ingredients:</h1>";
	echo "<ul>";
	while($row = mysql_fetch_array($result)) {
		echo "<li>" . $row['ingredientName'] . "</li>";
	}
	echo "</ul>";
	echo "</div>";


?>


<input type="button" value="What Can I make" onclick="location='recommend.php'" />

	</div>
  </body>
</html>
