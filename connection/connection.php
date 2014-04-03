<?php
$username = "root";
$password = "root";
$hostname = "localhost"; 
$bd= "tunisianwatch";
        
$dbhandle = mysql_connect($hostname, $username, $password) or die("Unable to connect to MySQL");

$selectDB = mysql_select_db($bd,$dbhandle) or die("Could not select the database");
?>