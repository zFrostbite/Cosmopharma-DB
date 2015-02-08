<?php
	define("DB_SERVER", "localhost");
	define("DB_PASSWORD", 1337);
	define("DB_USER", "root");
	define("DB_NAME", "cosmopharma");
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
	if(mysqli_connect_errno()){
		die("Database connection FAILED");
	}
?>