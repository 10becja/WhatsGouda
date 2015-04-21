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
	<h3>Write a Review:</h3>
	<form class="form-horizontal" method="post" action="addReview.php" name="reviewForm" id="reviewForm">
    <fieldset>
	<!-- Recipe ID -->
<?php 
	echo '<input type="hidden" name="recipeId" value="' . $recipeId . '"/>';
?>
	  <!-- Difficulty -->
      <div class="form-group">
        <label class="col-lg-2 control-label">Difficulty</label>
        <div class="col-lg-10">
          <select class="form-control" name="difficulty" id="difficulty">
          	<option>5</option>
          	<option>4</option>
          	<option>3</option>
          	<option>2</option>
          	<option>1</option>
		  </select>
        </div>
      </div>
	  <!-- Quality -->
      <div class="form-group">
        <label class="col-lg-2 control-label">Quality</label>
        <div class="col-lg-10">
          <select class="form-control" name="quality" id="quality">
          	<option>5</option>
          	<option>4</option>
          	<option>3</option>
          	<option>2</option>
          	<option>1</option>
		  </select>
        </div>
      </div>
	  <!-- Review Body -->
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
          <input type="submit" class="btn btn-primary" name="addReview" id="addReview" value="Submit" />
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
		if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username'])) { 
			//printReviewForm($recipeId);
		}
	}
	else {
		echo "<h1>Recipe not found</h1>";
	}
?>
