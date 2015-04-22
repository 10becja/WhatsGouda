<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php


	$username = $_GET["username"];
	$recipeQuery = 'SELECT * FROM Recipe WHERE creatorUsername= "' . $username. '";';
	$recipeResult = mysql_query($recipeQuery);
	while($row = mysql_fetch_array($result)){
		echo "<tr><td><a href='viewRecipe.php?id=" . $row['id'] . "'>" . $row['name']. "</td></tr>";
	}  
?>