<?php include "./backEnd/base.php"; ?>
<?php include "navbar.php"; ?>

<?php
	$username = $_SESSION['username'];

	$query = 'SELECT * FROM Recipe where creatorUsername = "'. $username .'"';
	$result = mysql_query($query);
?>
	<table class="table table-striped table-hover table-bordered">
	<tr>
		<th>Quality</th>
		<th>Difficulty</th>
		<th>Reviews</th>
		<th>Name</th>
	</tr>
<?php
	$row = mysql_fetch_array($result);
	while ($row) 
	{
		echo "
		<tr>
			<td>" . $row['avgQuality'] . "</td>
			<td>" . $row['avgDifficulty'] . "</td>
			<td>" . $row['reviewCount'] . "</td>
			<td><a href='viewRecipe.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></td>
		</tr>";
		$row = mysql_fetch_array($result);
	}

?>



<input type="button" value="What Can I make" onclick="location='recommend.php'" />








	</div>
  </body>
</html>