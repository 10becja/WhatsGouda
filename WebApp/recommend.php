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
			return FALSE; //If we weren't able to find the required ingredient, then this recipe cannot be made
		}
	}
	return TRUE; //The only way to get here is to find all of the requirements
}
	$username = $_SESSION['username'];
	$sql = 'SELECT Recipe.name AS RecommendRecipe, Recipe.id as recipeID, reqreq.ingredientid as requirements, hashas.ingredientid as hasIngredients
			FROM hashas, Recipe, reqreq
			WHERE reqreq.recipeID = Recipe.id 
						AND hashas.username = "' . $username. '"
						AND FIND_IN_SET(reqreq.ingredientid, hashas.ingredientid) > 0;';
	
	//echo $sql;
	$result = mysql_query($sql);
	
	echo '<table class="table table-striped table-hover table-bordered">';
	
	echo "<tr><th>" ."Recipe Name". "</th></tr>";
	while($row = mysql_fetch_array($result)){
		if meetsRequirements($row['requirements'], $row['hasIngredients']) {
			echo "<tr><td><a href='./viewRecipe.php?id=" . $row['recipeID'] . "'>" . $row['RecommendRecipe'] . "</a></td></tr>";
		}
	}        
 

?>

