<?php
$username = "www";
$password = "p@ssw0rd";
$hostname = "localhost";

$db_name = "canteen";

$db = mysql_connect($hostname, $username,$password);
if (!$db)
    die ('Could not connect: ' . mysql_error());
mysql_select_db($db_name,$db);


?>
