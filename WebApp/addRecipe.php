<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php 
	if(!empty($_POST['ingredients'])) {
		$username = $_SESSION['username'];
		$name = mysql_real_escape_string($_POST['name']);
		$body = mysql_real_escape_string($_POST['instructions']);
		//echo "<h1> $username, $name, $body </h1>";
		$query = 'INSERT INTO Recipe (avgQuality, avgDifficulty, reviewCount, name, creatorUsername, body) VALUES (0,0,0, "' . $name . '", "' . $username. '", "' . $body . '")';
		$result = mysql_query($query);
		if(!$result) {
			echo "<h1>There was an error processing your submission. Please try again.</h1>";
		}
		else {
			$recipeId = mysql_insert_id();
			$ingredients = explode(";", $_POST['ingredients']);
			foreach ($ingredients as &$ingredient) {
				$ingredientId = intval($ingredient);
				$query = "INSERT INTO Requires VALUES ($recipeId , $ingredientId)";
				mysql_query($query);
			}

			echo "<h1>Your recipe was successfully submitted!</h1>";
		}
	}
	if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username'])) {
?>
<div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="forms">Create a new Recipe!</h1>
            </div>
          </div>
        </div>
        <div class="row"> 
          <div class="col-lg-6"> 
            <div class="well"> 
              <p>Share your wonderful food with the world!</p>
  <script src="./js/selectize.min.js" ></script>
  <form class="form-horizontal" method="post" action="addRecipe.php" name="addrecipeform" id="addrecipeform">
    <fieldset>
      <!-- Recipe Name -->
      <div class="form-group">
        <label class="col-lg-2 control-label">Recipe Name</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="name" id="name" placeholder="Name" />
        </div>
      </div>
      <!-- Ingredients -->
      <div class="form-group">
      	<label class ="col-lg-2 control-label">Ingredients</label>
      	<div class="col-lg-10">
      	  <input type="text" name="ingredients" id="ingredients" />
          <p>If you can't find an ingedient, try <a href="./createIngredient.php">creating one</a>.</p> 
      	</div>
      </div>
      <!-- Instructions -->
      <div class="form-group">
        <label class="col-lg-2 control-label">Instructions</label>
        <div class="col-lg-10">
          <textarea class="form-control" name="instructions" id="instructions" rows="3" placeholder="Type instructions here">
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
  </div> 
          </div>
        </div>
  <script>
  	<?php
  		$query = "SELECT * FROM Ingredient";
  		$result = mysql_query($query);
  		$num = 0;
  		echo "options = [";
  		while($row = mysql_fetch_array($result)) {
  			if($num > 0) {
  				echo ",";
  			}
  			echo "{value: '" . $row["id"] . "', text: '" . $row["name"] . "'}";
  			$num = $num + 1;
  		}
  		echo "];";
  	?>
  	$('#ingredients').selectize({
  		delimiter: ';',
  		options: options,
  		/**
  		create: function(input) {
  			return{
  				value: "!"+input,
  				text: input
  			}
  		}
  		*/
  		create: false
  	});
  </script>
<?php
	}
    else {
        echo '<p>Please <a href="./login.php">log in</a> if you want to create a recipe.</p>';
    }
?>

</div>
  </body>
</html>
