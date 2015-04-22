<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
	$username = $_SESSION['username'];
	$query = 'SELECT * FROM Recipe WHERE creatorUsername = "'. $username . '"';
	$result = $mysql_query($query);
?>
<form method="post" action="./deleteRecipe.php">
Select the Name to Delete: <select name="sel">
<option>Select</option>
<?php
	while($row = mysql_fetch_array($result)) {
		echo "<option>" . $row . "</option>";
	}
?>
</select><br />

<input name="submit" type="submit" value="Delete"/><br />

</form>
<p align=right><a href="searchResult.php">VIEW RECORDS</a></p>
<p align=right><a href="index.php">HOME</a></p>
<?php

if(isset($_POST['submit']))
{
$name=$_POST['sel'];


$query = "DELETE FROM Recipe WHERE name='$name'";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
echo "Successfully Deleted!";
}


?>
