<?php session_start();?>
<?php require_once("../includes/db_connection.php")?>
<?php require_once("../includes/functions.php") ?>
<?php 
	if($_SESSION["Innlogget"])
	{
		echo "Hallais. Session: " . $_SESSION["Innlogget"];
	}else{
		redirect_to("index.php");
	}
?>
<link rel="stylesheet" href="stylesheets/public.css">
<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Min Cosmopharma Vareliste</title>
	</head>
	<body>
	 	<div id="header">
	 	<h1> Min Cosmopharma Vareliste</h1>
	 	</div>
	 	<div id="navigation">
	 		Spøøkje
	 	</div>
	 	<div id="footer"> 
	 		Copyright Ruben Larsen 2015
	 	</div>
	</body>
</html>