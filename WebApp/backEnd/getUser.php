<?php
include "db.php";
function getUser($connection){
	$sql = "SELECT * FROM User";
	$result = $connection->query($sql);

	if ($result->num_rows > 0){	 
		while($row = $result->fetch_assoc()){
			echo "username: ". $row["username"] . " -email: " . $row["email"] . " -title: ". $row["title"] . " -password: ". $row["password"];
		}        
	}
}

getUser($conn);
?>