<!-- Used to add an ingredient to a user-->


<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
	if(!empty($_POST['ingredients']) && !empty($_SESSION['LoggedIn']) && !empty($_SESSION['username'])) {
		$username = $_SESSION['username'];
		$ingredients = explode(";", $_POST['ingredients']);

		foreach ($ingredients as &$ingredient) {
			$ingredientId = intval($ingredient);
			$query = 'DELETE FROM Has WHERE username="' . $username . '" AND id=' . $ingredientId;
			echo $query;
			//mysql_query($query);
		}
	} 
?>
<div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="forms">Delete Ingredients!</h1>
            </div>
          </div>
        </div>
        <div class="row"> 
          <div class="col-lg-6"> 
            <div class="well"> 
              <p>Delete ingredients from your list here.</p>
<script src="./js/selectize.min.js" ></script>
 <form class="form-horizontal" method="post" action="deleteIngredient.php" name="deleteingredientform" id="deleteingredientform">
    <fieldset>
    <!-- Ingredients -->
      <div class="form-group">
      	<label class ="col-lg-2 control-label">Ingredients</label>
      	<div class="col-lg-10">
      	  <input type="text" name="ingredients" id="ingredients" />
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
      $username = $_SESSION['username']
  		$query = 'SELECT Ingredient.name AS ingredientName, Ingredient.id as ingredientID FROM Has, Ingredient WHERE Has.username="' . $username . '" AND Ingredient.id=Has.ingredientID';
  		$result = mysql_query($query);
  		$num = 0;
  		echo "options = [";
  		while($row = mysql_fetch_array($result)) {
  			if($num > 0) {
  				echo ",";
  			}
  			echo "{value: '" . $row["ingredientID"] . "', text: '" . $row["ingredientName"] . "'}";
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

  </div>
  </body>
</html>
