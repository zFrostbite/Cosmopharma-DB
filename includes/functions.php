<?php
	
	function form_errors($error_array=array()) {
		$output = "";
		if(!empty($error_array)){
			$output 	 = 	"<div class=\"Error\">";
			$output 	.= 	"Vennligst fiks følgende feil:";
			$output 	.="<ul>";
			foreach($error_array as $key => $error) {
				$output 	.="<li>{$error}</li>";
			}
			$output 	.="</ul>";
			$output 	.="</div>";
		}
		return $output;
	}
	
	function show_all_consultants()
	{
		global $connection;
		$query = 	"SELECT * ";
		$query .=	"FROM users ";
		$query .=	"ORDER BY brukernavn ASC";
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		return $result;
	}
	
	function log_in_user($brukernavn)
	{
		$_SESSION["Innlogget"] = TRUE;
	}
	
	function er_innlogget() 
	{
		return isset($_SESSION['Innlogget']);
	}
	
	function log_out_user($brukernavn)
	{
		
	}
	function confirm_query($result_set)
	{
		if(!$result_set) {
			die("Database query failed.");
		}
	}
	
	function redirect_to($new_location) {
		header("Location: " . $new_location);
		exit;
	}
	
	function has_presence($string)
	{
		return isset($string) && $string !== "";
	}
	
	function validate_max_lengths($fields_with_max_lengths) {
		global $errors;
		global $max;
		//Using an assoc. array
		foreach($fields_with_max_lengths as $field => $max) {
			$value = trim($_POST[$field]);
			if(!has_max_length($value, $max) && !has_presence($value)) {
				$errors[$field] = ucfirst($field) . " is too long";
			}
		}
	}
	
	function has_max_length($value, $max) {
		return strlen($value) <= $max;
	}
?>