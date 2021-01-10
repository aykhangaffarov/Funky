<?php
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="fun";
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	mysqli_set_charset($conn, "utf8");
	
?>