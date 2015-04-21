<?php include "./backEnd/base.php"; ?>
	<?php include "navbar.php"; ?>
<h1>Welcome to What's Gouda!</h1>
<h3>Let's find out what's gooda:</h3>
<?php
	$query = 'SELECT * FROM Recipe ORDER BY avgQuality DESC';
	$result = mysql_query($query);
	$num = 0;
	echo '<table class="table table-striped table-hover table-bordered">';
	echo "<tr><th>" . "Quality" . "</th><th>" . "Difficulty" . "</th><th>" . "Reviews" . "</th><th>" . "Name" . "</th><th>" . "Creator Username" . "</th></tr>";
	$row = mysql_fetch_array($result);
	while ($row && $num < 10) {
		echo "<tr><td>" . $row['avgQuality'] . "</td><td>" . $row['avgDifficulty'] . "</td><td>" . $row['reviewCount'] . "</td><td><a href='viewRecipe.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></td><td>" . $row['creatorUsername'] . "</td></tr>";
		$num = $num + 1;
		$row = mysql_fetch_array($result);
	}

?>









	

    
	</div>
  </body>
</html>
