<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
	if(!empty($_POST['reviewBody'])) {
		$username = $_SESSION['username'];
		$body = mysql_real_escape_string($_POST['reviewBody']);
		$quality = $_POST['quality'];
		$difficulty = $_POST['difficulty'];
		$recipeId = $_POST['recipeId'];

		$recipeQuery = 'SELECT creatorUsername FROM Recipe WHERE id=' . $recipeId;
		$result = mysql_query($recipeQuery);
		$row = mysql_fetch_array($result);
		if ($row['creatorUsername'] == $username) {
			echo "<h1>You can't review your own recipe!</h1>";
		}
		else {
			$query = 'INSERT INTO Review VALUES (NULL, ' . $quality . ', ' . $difficulty . ', "' . $body . '", 0, "' . $username .'", '. $recipeId . ')';
			$result = mysql_query($query);
			if(!$result) {
				echo "<h1>There was an error processing your submission. Please try again. </h1>";
			}
			else {
				echo "<h1>Your review was successfully submitted!</h1>";
			}
		}
		echo '<p>Click <a href="./viewRecipe.php?id=' . $recipeId . '">here</a> to go back to the recipe.</p>';
	}
?>
