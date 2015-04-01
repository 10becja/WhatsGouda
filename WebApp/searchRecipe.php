<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>

<form Method="POST" action="./backEnd/searchRecipe.php">
      <div class="form-group">
      <label>Search By Name of Recipe</label>
      <input type="text" name="searchterm" class="form-control" id="searchInput" placeholder="Enter search term here">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
    </form>
