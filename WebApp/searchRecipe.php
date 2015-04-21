<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>

<form Method="POST" action="./searchResult.php">
      <div class="form-group">
      <label>Search for a recipe:</label>
      <input type="text" name="searchterm" class="form-control" id="searchInput" placeholder="Enter search term here">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
      <button class="btn btn-default" onclick="./dispAllRecipes.php">Browse All</button>
    </form>
</body>
</html>
