<?php
session_start();
 
$dbhost = "localhost"; // used when on server
//$dbhost = "104.236.86.166";  //used for local machine testing
$dbname = "gouda";
$dbuser = "gouda";
$dbpass = ""; // no password from server
//$dbpass = "cs411goudapassword"; //needed for remote connections
 
mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
?>
