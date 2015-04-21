<!-- Used to add an ingredient to a user-->


<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
	if(!empty($_POST['ingredients']) && !empty($_SESSION['LoggedIn']) && !empty($_SESSION['username'])) {
		$username = $_SESSION['username'];
		$ingredients = explode(";", $_POST['ingredients']);

		foreach ($ingredients as &$ingredient) {
			$ingredientId = intval($ingredient);
			$query = 'INSERT INTO Has VALUES ("' . $username . '", ' . $ingredientId . ')';
			//echo $query;
			mysql_query($query);
		}
	} 
?>
<div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="forms">Add an Ingredient!</h1>
            </div>
          </div>
        </div>
        <div class="row"> 
          <div class="col-lg-6"> 
            <div class="well"> 
              <p>Add ingredients to your list here.</p>
<script src="./js/selectize.min.js" ></script>
 <form class="form-horizontal" method="post" action="addIngredient.php" name="addingredientform" id="addigredientform">
    <fieldset>
    <!-- Ingredients -->
      <div class="form-group">
      	<label class ="col-lg-2 control-label">Ingredients</label>
      	<div class="col-lg-10">
      	  <input type="text" name="ingredients" id="ingredients" />
          <p>If you can't find an ingedient, try <a href="./createIngredient.php">creating one</a>.</p> 
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

  </div>
  </body>
</html>
