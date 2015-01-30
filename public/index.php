<?php session_start();?>
<?php header('Content-Type: text/html; charset=ISO-8859-1')?>
<?php require_once("../includes/db_connection.php")?>
<?php require_once("../includes/functions.php") ?>
<link rel="stylesheet" href="stylesheets/public.css">
<?php 
	if($_SESSION["Innlogget"])
	{
		redirect_to("oversikt.php");
	}else{
		redirect_to("index.php");
	}	
	$errors = array();
	$message = "";
	if(isset($_POST["submit"]))
	{
		//Har trykt "Logg inn"
		$Brukernavn = trim($_POST["Brukernavn"]);
		$Passord = trim($_POST["Passord"]);
		print_r($_POST);
		//validering
		$required_fields = array("Brukernavn", "Passord");
		foreach($required_fields as $field) {
			$value = trim($_POST[$field]);
			if(!has_presence($value)) {
				$errors[$field] = "Vennligst skriv inn ditt " . $field;
			}
		}
		//$fields_with_max_length = array("Brukernavn" => 30, "Passord" => 30);
		//validate_max_lengths($fields_with_max_length);
		if(empty($errors))
		{
			//Forsøk på å logge inn.
			$query = "SELECT * ";
			$query .= "FROM users ";
			$query .= "WHERE Brukernavn = '{$Brukernavn}' ";
			$query .= "AND Passord = '{$Passord}' ";
			echo $query;
			$message = "Brukernavn- og/eller passordet du skrev stemmer ikke overens med vår database!";
			mysqli_real_escape_string($connection, $query);
			$result = mysqli_query($connection, $query);

			foreach($result as $row)
			{
				if(!$row["Brukernavn"] || !$row["Passord"] )
				{
					$message = "Brukernavn- og/eller passordet du skrev stemmer ikke overens med vår database!";
				}elseif($row["Brukernavn"] == $Brukernavn && $row["Passord"] == $Passord){
					$_SESSION["Innlogget"] = TRUE;
					redirect_to("oversikt.php");
				}
			}
		}  
	}else{
		$Brukernavn = "";
		$message = "Vennligst logg inn.";
	}				 


?>
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
		 	 
		 	<center>
		 	<h4><?php echo $message;?></h4>
		 	<?php echo form_errors($errors); ?>
		 	<form action="index.php" method="post">
		 	Brukernavn: <input type="text" name="Brukernavn" value="<?php echo htmlspecialchars($Brukernavn); ?>"> </br>
			Passord:	<input type="password" name="Passord" value=""> </br></br>
			<input type="submit" name="submit" value="Logg inn">
			
		 	</center>	
		 	</form>
	 	</div>
	 	
	 	<div id="footer"> 
	 		Copyright Ruben Larsen 2015
	 	</div>
	</body>
</html>