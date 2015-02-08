<?php header('Content-Type: text/html; charset=ISO-8859-1')?>
<?php require_once("../includes/db_connection.php")?>
<?php require_once("../includes/functions.php") ?>
<?php 
	$errors = array();
	$message = "";
	if(isset($_POST['submit']))
	{
		//Har trykt "Logg inn"
		$username = trim($_POST['brukernavn']);
		$password = trim($_POST['passord']);
		
		//validering
		$required_fields = array("brukernavn", "passord");
		foreach($required_fields as $field) {
			$value = trim($_POST[$field]);
			if(!isset($required_field) && $required_fields !== "") {
				$errors[$field] = "Vennligst skriv inn ditt " . ucfirst($field);
			}
			
		}
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
	 	<h1> Min Cosmopharma Vareliste - Logg inn.</h1>
	 	</div>
	 	
	 	<div id="main">  
		 	<form action="index.php" method="post"> 
		 	<center>
		 	<?php echo form_errors($errors); ?>
		 	Brukernavn: <input type="text" name="brukernavn" value=""> </br>
			Passord:	<input type="password" name="passord" value=""> </br></br>
			<input type="submit" name="submit" value="Logg inn">
			
		 	</center>	
		 	</form>
	 	</div>
	 	
	 	<div id="footer"> 
	 		Copyright Ruben Larsen 2015
	 	</div>
	</body>
</html>