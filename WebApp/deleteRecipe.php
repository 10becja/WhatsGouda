<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
	$username = $_SESSION['username'];
	$query = 'SELECT * FROM Recipe WHERE creatorUsername = "'. $username . '"';
	$result = mysql_query($query);
?>
<form class="form-horizontal" method="post" action="./deleteRecipe.php">
	<label class="control-label">Select the Name to Delete:</label>
	<select class="form-control" name="sel">
		<option value='-1'>No Selection</option>
<?php
	while($row = mysql_fetch_array($result)) {
		echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
	}
?>
	</select><br />

	<input class="btn btn-primary" name="submit" type="submit" value="Delete"/><br />

</form>
<p align=right><a href="searchResult.php">VIEW RECORDS</a></p>
<p align=right><a href="index.php">HOME</a></p>
<?php

if(isset($_POST['submit']))
{
	$recipeId=$_POST['sel'];
	if($recipeId != '-1') { 
		$query = 'DELETE FROM Recipe WHERE id="'. $recipeId . '"';
		$result=mysql_query($query) or die("Query Failed : ".mysql_error());
		echo "Successfully Deleted!";
	}
}


?>
