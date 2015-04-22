
<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
	$sql = 'SELECT creatorUsername, Avg(avgQuality) AS avgQuality
			FROM Recipe
			GROUP BY creatorUsername
			ORDER BY avgQuality DESC';
	
	$result = mysql_query($sql);

	echo '<table class="table table-striped table-hover table-bordered">';
	
	
	echo "<tr><th>" . "creatorUsername" . "</th><th>" . "avgQuality" . "</th></tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr><td><a href='viewUserRecipe.php?creatorUsername=" . $row['creatorUsername'] . "'>". $row['creatorUsername'] . "</th><th>" . number_format((float)$row['avgQuality'], 2, '.', '') . "</td></tr>";
			
	}        

	


?>

