<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
	if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username'])) {
?>
  <script src="./selectize.min.js" ></script>
  <form class="form-horizontal" method="post" action="addRecipe.php" name="addrecipeform" id="addrecipeform">
    <fieldset>
      <!-- Recipe Name -->
      <div class="form-group">
        <label class="col-lg-2 control-label">Recipe Name</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="Name" id="Name" placeholder="Name" />
        </div>
      </div>
      <!-- Ingredients -->
      <div class="form-group">
      	<label class ="col-lg-2 control-label">Ingredients</label>
      	<div class="col-lg-10">
      	  <input type="text" name="ingredients" id="ingredients" />
      	 </div>
      </div>
      <!-- Instructions -->
      <div class="form-group">
        <label class="col-lg-2 control-label">Instructions</label>
        <div class="col-lg-10">
          <textarea class="form-control" name="body" id="body" rows="3" placeholder="Type instructions here">
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
  <script>
  	$('#ingredients').selectize({
  		delimiter: ';',
  		create: function(input) {
  			return{
  				value: "!"+input,
  				text: input
  			}
  		}
  	});
  </script>
<?php
	}
    else {
        echo '<p>Please <a href="./login.php">log in</a> if you want to create a recipe.</p>';
    }
?>
