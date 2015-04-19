<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php 
	if(!empty($_POST['name'])) {
		//$username = $_SESSION['username'];
		$name = mysql_real_escape_string($_POST['name']);
		//$body = mysql_real_escape_string($_POST['instructions']);
		//echo "<h1> $username, $name, $body </h1>";
		$query = 'DELETE FROM Recipe WHERE name = '$name'';
		$result = mysql_query($query);
		if(!$result) {
			echo "<h1>There was an error processing your submission. Please try again.</h1>";
		}
		else {
			/*$recipeId = mysql_insert_id();
			$ingredients = explode(";", $_POST['ingredients']);
			foreach ($ingredients as &$ingredient) {
				$ingredientId = intval($ingredient);
				$query = "INSERT INTO Requires VALUES ($recipeId , $ingredientId)";
				mysql_query($query);
			}*/

			echo "<h1>The recipe doesn't exist!</h1>";
		}
	}
	if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username'])) {
?>
  <script src="./selectize.min.js" ></script>
  <form class="form-horizontal" method="post" action="deleteRecipe.php" name="deleterecipeform" id="deleterecipeform">
    <fieldset>
      <!-- Recipe Name -->
      <div class="form-group">
        <label class="col-lg-2 control-label">Recipe Name</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="name" id="name" placeholder="Name" />
        </div>
      </div>
      <!-- BUTTON -->
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <input type="submit" class="btn btn-primary" name="deleteRecipe" id="deleteRecipe" value="Submit" />
        </div>
      </div>
    </fieldset>
  </form>
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
