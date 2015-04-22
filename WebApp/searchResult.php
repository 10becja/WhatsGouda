<?php
include "./backEnd/base.php";
include "./navbar.php";
function searchRecipe($qry){
	$sql = "SELECT * FROM Recipe WHERE name LIKE '%$qry%'";
	
	$result = mysql_query($sql);

	echo '<table class="table table-striped table-hover table-bordered">';
	
	
	echo "<tr><th>" . "avgQuality" . "</th><th>" . "avgDifficulty" . "</th><th>" . "reviewCount" . "</th><th>" . "name" . "</th><th>" . "creatorUsername" . "</th></tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr><td>" . number_format((float)$row['avgQuality'], 2, '.', '') . "</td><td>" . number_format((float)$row['avgDifficulty'], 2, '.', '') . "</td><td>" . $row['reviewCount'] . "</td><td><a href='viewRecipe.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></td><td>" . $row['creatorUsername'] . "</td></tr>";
	}        

	
}

searchRecipe(mysql_real_escape_string($_POST["searchterm"]));
?>





	</div>
  </body>
</html>
