<?php
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		header('location:../404.php');
	}

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "a_wisata";
	
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(!$connection) {
		die("Connection Failed : " .mysqli_connect_error());
	}
?>