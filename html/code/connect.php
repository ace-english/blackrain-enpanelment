<?php 

DEFINE ('DB_USER', 'root');
 // Replace text with Database Server Password
DEFINE ('DB_PASSWORD', 'root1');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'health');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
	mysqli_connect_error());

 ?>