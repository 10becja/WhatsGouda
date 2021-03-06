<!-- Used to add a new ingredient to the database -->

<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php 
  if(!empty($_POST['ingredientName'])) 
  {
    $name = mysql_real_escape_string($_POST['ingredientName']);
    $checkingr = mysql_query("SELECT * FROM Ingredient WHERE name = '".$name."'");

    if(mysql_num_rows($checkingr) >= 1)
    {
      echo "<h1>Error</h1>";
      echo "<p>Sorry, that ingredient already exists</p>";
    }
    else
    {
      $query = 'INSERT INTO Ingredient (id, name) VALUES (0, "' . $name . '")';
      $result = mysql_query($query);
      if(!$result) {
        echo "<h1>There was an error processing your submission. Please try again.</h1>";
      }
      else {
        echo "<h1>New Ingredient added!</h1>";
      }
    }
  }
  if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username'])) {
?>
<div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="forms">Create a new Ingredient!</h1>
            </div>
          </div>
        </div>
        <div class="row"> 
          <div class="col-lg-6"> 
            <div class="well"> 
              <p>Can't find an ingredient in our database? You can create a new one here!</p>
  <form class="form-horizontal" method="post" action="createIngredient.php" name="createIngredientform" id="createIngredientform">
    <fieldset>
      <!-- Recipe Name -->
      <div class="form-group">
        <label class="col-lg-2 control-label">Ingredient Name</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="ingredientName" id="ingredientName" placeholder="ie, Corn..." />
        </div>
      </div>
      <!-- BUTTON -->
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <input type="submit" class="btn btn-primary" name="createIngredient" id="createIngredient" value="Create!" />
        </div>
      </div>
    </fieldset>
  </form>
  </div> 
  </div>
  </div>
<?php
  }
    else {
        echo '<p>Please <a href="./login.php">log in</a> if you want to create an Ingredient.</p>';
    }
?>

</div>
  </body>
</html>
