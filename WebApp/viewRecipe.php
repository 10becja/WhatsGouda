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

function printReviewForm($recipeId) {
?>
	<form class="form-horizontal" method="post" action="" name="reviewForm" id="reviewForm">
    <fieldset>
<?php 
	echo '<input type="hidden" name="recipeId" value="' . $recipeId . '"/>';
?>
      <div class="form-group">
        <label class="col-lg-2 control-label">Difficulty</label>
        <div class="col-lg-10">
          <select class="form-control" name="difficulty" id="difficulty">
          	<option>5</option>
          	<option>4</option>
          	<option>3</option>
          	<option>2</option>
          	<option>1</option>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Quality</label>
        <div class="col-lg-10">
          <select class="form-control" name="quality" id="quality">
          	<option>5</option>
          	<option>4</option>
          	<option>3</option>
          	<option>2</option>
          	<option>1</option>
        </div>
      </div>
      <!-- Instructions -->
      <div class="form-group">
        <label class="col-lg-2 control-label">Review</label>
        <div class="col-lg-10">
          <textarea class="form-control" name="reviewBody" id="reviewBody" rows="3">
          </textarea>
        </div>
      </div>
      <!-- BUTTON -->
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <input type="submit" class="btn btn-primary" name="addRecipe" id="addRecipe" value="Submit" />
        </div>
      </div>
    </fieldset>
  </form>
<?php	
}

	$recipeId = $_GET["id"];
	$recipeQuery = "SELECT * FROM Recipe WHERE id=$recipeId";
	$recipeResult = mysql_query($recipeQuery);
	if($recipeRow = mysql_fetch_array($recipeResult)) {
		printRecipe($recipeRow);
		printReviewForm($recipeId);
	}
	else {
		echo "<h1>Recipe not found</h1>";
	}
?>
