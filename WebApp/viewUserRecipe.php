<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php


	$username = mysql_real_escape_string($_GET["creatorUsername"]);
	echo '<h1>' . $username . "'s Recipes: </h1>";
	$recipeQuery = 'SELECT * FROM Recipe WHERE creatorUsername="' . $username. '";';
	$recipeResult = mysql_query($recipeQuery);
	echo '<table class="table table-striped table-hover table-bordered">';
	echo '<tr>
			<th>Recipe Name</th>
			<th>Quality</th>
			<th>Difficulty</th>
		  </tr>';
	while($row = mysql_fetch_array($recipeResult)){
		echo "<tr>
				<td><a href='viewRecipe.php?id=" . $row['id'] . "'>" . $row['name']. "</a></td>
				<td>" . number_format((float)$row['avgQuality'], 2, '.', '') . "</td>
				<td>" . number_format((float)$row['avgDifficulty'], 2, '.', '') . "</td>
			</tr>";
	}  
	echo '</table>';
?>
