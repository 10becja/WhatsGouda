<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
	$username = $_SESSION['username'];
	$query = 'SELECT * FROM Recipe WHERE creatorUsername = "'. $username . '"';
	$result = mysql_query($query);
?>
<div class="row">
	<div class="col-lg-12">
		<div class="page-header">
			<h1 id="forms">Delete Recipe</h1>
		</div>
	</div>
</div>
<div class="row"> 
	<div class="col-lg-6"> 
		<div class="well">
			<form class="form-horizontal" method="post" action="./deleteRecipe.php">
			<fieldset>
				<!-- Select Recipe -->
				<div class="form-group">
					<label class="control-label">Select the Name to Delete:</label>
					<select class="form-control" name="sel">
						<option value='-1'>No Selection</option>

<?php
						while($row = mysql_fetch_array($result)) 
						{
							echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
						}
?>
					</select>
				</div>
				<!-- Button -->
				<div class="form-group">
					<input class="btn btn-primary" name="submit" type="submit" value="Delete"/>
				</div>
			</fieldset>
			</form>
		</div> 
	</div>
</div>
<?php

if(isset($_POST['submit']))
{
	$recipeId=$_POST['sel'];
	if($recipeId != '-1') { 
		$query = 'DELETE FROM Recipe WHERE id="'. $recipeId . '"';
		$result=mysql_query($query) or die("Query Failed : ".mysql_error());
		echo "Successfully Deleted!";
		$deleteReviewsQuery = 'DELETE FROM Review WHERE recipeID=' . $recipeId;
		$result = mysql_query($deleteReviewsQuery);
	}
}


?>
