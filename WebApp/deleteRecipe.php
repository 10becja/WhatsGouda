<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
session_start();
$username = $_SESSION['username'];
$query = "SELECT * FROM Recipe WHERE creatorUsername = '$username'";
$i=0;
while($rows=mysql_fetch_array($result))
{
$name[$i]=$rows['name'];
$i++;
}
$total_elmt=count($name);
?>
<form method="POST" action="">
Select the Name to Delete: <select name="sel">
<option>Select</option>
<?php 
for($j=0;$j<$total_elmt;$j++)
{
?><option><?php 
echo $name[$j];
?></option><?php
}
?>
</select><br />

<input name="submit" type="submit" value="Delete"/><br />

</form>
<p align=right><a href="view.php">VIEW RECORDS</a></p>
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