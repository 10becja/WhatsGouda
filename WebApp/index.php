<?php include "./backEnd/base.php"; ?>
	<?php include "navbar.php"; ?>
<h1>Welcome to What's Gouda!</h1>
<h3>Let's find out what's gooda:</h3>
<?php
	$query = "SELECT * FROM Recipe ORDER BY avgQuality";
	$result = mysql_query($query);
	$num = 0;
	echo '<table class="table table-striped table-hover table-bordered">';
	echo "<tr><th>" . "avgQuality" . "</th><th>" . "avgDifficulty" . "</th><th>" . "reviewCount" . "</th><th>" . "name" . "</th><th>" . "creatorUsername" . "</th></tr>";
	while ($row = mysql_fetch_array($result) && $num < 10) {
		echo "<tr><td>" . $row['avgQuality'] . "</td><td>" . $row['avgDifficulty'] . "</td><td>" . $row['reviewCount'] . "</td><td><a href='viewRecipe.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></td><td>" . $row['creatorUsername'] . "</td></tr>";
		$num = $num + 1;
	}

?>









	

    
	</div>
  </body>
</html>
