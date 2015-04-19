<?php include "./backEnd/base.php";?>
<?php include "./navbar.php";?>
<?php
if(isset($_POST['delete']))
{
$recipe_name = $_POST['name'];

$sql = "DELETE from Recipe ".
       "WHERE recipe_name = $name" ;

$retval = mysql_query($sql);
if(! $retval )
{
  die('Could not delete data: ' . mysql_error());
}
echo "Deleted data successfully\n";
}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width="100">Recipe Name</td>
<td><input name="emp_id" type="text" id="emp_id"></td>
</tr>
<tr>
<td width="100"> </td>
<td> </td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="delete" type="submit" id="delete" value="Delete">
</td>
</tr>
</table>
</form>
<?php
}
?>
