<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
	$recipeID = $_GET['id'];
	$recipeQuery = "SELECT * FROM Recipe WHERE id=" . $recipeID;
	$result = mysql_query($recipeQuery);
	$recipe = mysql_fetch_array($result);
	
	$ingredientsQuery = "SELECT ingredientid FROM reqreq WHERE id=" . $recipeID;
	$ingredientsResult = mysql_query($ingredientsQuery);
	$ingredients = mysql_fetch_array($ingredientsResult);

	$initialIngredients = str_replace(',', ';', $ingredients);
	$initialName = $recipe['name'];
	$initialBody = $recipe['body'];

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
  <form class="form-horizontal" method="post" action="editRecipe.php" name="editRecipeform" id="editRecipeform">
    <fieldset>
      <!-- Recipe Name -->
      <div class="form-group">
        <label class="col-lg-2 control-label">Recipe Name</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="name" id="name" 
          	<?php
          		echo 'value="' . $initialName . '"';
          	?>
          />
        </div>
      </div>
      <!-- Ingredients -->
      <div class="form-group">
      	<label class ="col-lg-2 control-label">Ingredients</label>
      	<div class="col-lg-10">
      	  <input type="text" name="ingredients" id="ingredients" 
      	  <?php
      	  	echo 'value="' . $initialIngredients . '"';
      	  ?>
      	  />
          <p>If you can't find an ingedient, try <a href="./createIngredient.php">creating one</a>.</p> 
      	</div>
      </div>
      <!-- Instructions -->
      <div class="form-group">
        <label class="col-lg-2 control-label">Instructions</label>
        <div class="col-lg-10">
          <textarea class="form-control" name="instructions" id="instructions" rows="3">
			<?php
				echo $initialBody;
			?>
          </textarea>
        </div>
      </div>
      <!-- BUTTON -->
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <input type="submit" class="btn btn-primary" name="editRecipe" id="editRecipe" value="Submit" />
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
