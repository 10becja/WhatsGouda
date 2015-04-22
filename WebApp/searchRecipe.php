<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>

<div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="forms">Search Recipes</h1>
            </div>
          </div>
        </div>

                <div class="row"> 
          <div class="col-lg-6"> 
            <div class="well"> 

<form Method="POST" action="./searchResult.php">
      <div class="form-group">
      	<label>Enter a recipe to search for:</label>
      	<input type="text" name="searchterm" class="form-control" id="searchInput" placeholder="Pizza">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
      <button class="btn btn-default" onclick="./dispAllRecipes.php">Browse All</button>
    </form>

    </div>
          </div>
        </div>
</body>
</html>
