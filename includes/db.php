<?php
$hostname = "localhost"; 
$username = "danielud";
$password = "ivert123.";
$database = "danielud_finalRI";

/*$hostname = "localhost"; 
$username = "root";
$password = "root";
$database = "Coleccion";*/

//Connection to database
$link = mysql_connect($hostname, $username, $password);
mysql_select_db($database, $link);
?>
