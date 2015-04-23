<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
function meetsRequirements($requirements, $hasIngredients) {
	$requirementsList = explode(',', $requirements);
	$hasList = explode(',', $hasIngredients);
	foreach($requirementsList as &$requirement) {
		$fulfilled = FALSE;
		foreach($hasList as &$hasIngredient) {
			if($requirement==$hasIngredient) {
				$fulfilled = TRUE; //We found that the user has the ingredient. Yay!
				break; //So let's break to save computation time
			}
		}
		if(!$fulfilled) {
			return FALSE; //If any of the ingredients cannot be fulfilled, then the recipe cannot be made
						  //or recommended to the user
		}
	}
	return TRUE; //The only way to get here is to find all of the requirements
}

function mostlyMeetsRequirements($requirements, $hasIngredients) {
	$requirementsList = explode(',', $requirements);
	$minimum = count($requirementsList) * .75; // need 75% of ingredients in basket
	$hasList = explode(',', $hasIngredients);
	foreach($requirementsList as &$requirement) {
		foreach($hasList as &$hasIngredient) {
			if($requirement==$hasIngredient) {
				--$minimum;
				break; // break to save computation time
			}
		}
		if($minimum <= 0) {
			return TRUE; 
		}
	}
	return FALSE; // > 75% of ingredients
}


	$username = $_SESSION['username'];
	$sql = 'SELECT Recipe.name AS RecommendRecipe, 
					Recipe.id as recipeID,
					Recipe.avgQuality AS quality,
					Recipe.avgDifficulty AS difficulty,
					Recipe.creatorUsername AS creator,
					reqreq.ingredientid as requirements, 
					hashas.ingredientid as hasIngredients
			FROM hashas, Recipe, reqreq
			WHERE reqreq.recipeID = Recipe.id 
						AND hashas.username = "' . $username. '";';
	
	//echo $sql;
	$result = mysql_query($sql);

	echo "<big><big>You have all the ingredients for these recipes:</big></big>";

	echo '<table class="table table-striped table-hover table-bordered">';

	echo "<tr>
			<th>Recipe Name</th>
			<th>Quality</th>
			<th>Difficulty</th>
			<th>Creator</th>
		 </tr>";

	$partialMatches = ""; // we will build this string in the while loop
	// then print it after all the true matches are found

	while($row = mysql_fetch_array($result)){
		if(meetsRequirements($row['requirements'], $row['hasIngredients'])) {
			echo "<tr>
					<td><a href='./viewRecipe.php?id=" . $row['recipeID'] . "'>" . $row['RecommendRecipe'] . "</a></td>
					<td>" . number_format((float)$row['quality'], 2, '.', '') . "</td>
					<td>" . number_format((float)$row['difficulty'], 2, '.', '') . "</td>
					<td>" . $row['creator'] . "</td>
				 </tr>";

		}
		else if(mostlyMeetsRequirements($row['requirements'], $row['hasIngredients'])) {
			$partialMatches .=  "<tr>
					<td><a href='./viewRecipe.php?id=" . $row['recipeID'] . "'>" . $row['RecommendRecipe'] . "</a></td>
					<td>" . number_format((float)$row['quality'], 2, '.', '') . "</td>
					<td>" . number_format((float)$row['difficulty'], 2, '.', '') . "</td>
					<td>" . $row['creator'] . "</td>
				 </tr>";

		}
	}  

	if (strlen($partialMatches) > 0) {
		echo '<table class="table table-striped table-hover table-bordered">';

		echo "<tr>
			<th>Recipe Name</th>
			<th>Quality</th>
			<th>Difficulty</th>
			<th>Creator</th>
		 </tr>";


		echo "<p><big><big>You might also try your luck at these, with a few substitutes:<big><big></p>";
		echo $partialMatches;
	}

?>

