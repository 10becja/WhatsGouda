<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
echo "<h1>Hello</h1>"
	if(!empty($_POST['reviewBody'])) {
		$username = $_SESSION['username'];
		$body = mysql_real_escape_string($_POST['reviewBody']);
		$quality = int($_POST['quality']);
		$difficulty = int($_POST['difficulty']);
		$recipeId = int($_POST['recipeId']);

		$query = 'INSERT INTO Review VALUES (NULL, ' . $quality . ', ' . $difficulty . ', "' . $body. '", 0, "' . $username .'", '. $recipeId . ')';
		$result = mysql_query($query);
		if(!$result) {
			echo "<h1>There was an error processing your submission. Please try again. </h1>";
		}
		else {
			echo "<h1>Your review was successfully submitted!</h1>";
		}
	}
?>