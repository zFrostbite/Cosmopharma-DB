<?php
	function connect_to_db()
	{
		define("DB_SERVER", "localhost");
		define("DB_PASSWORD", 1337);
		define("DB_USER", "root");
		define("DB_NAME", "cosmopharma");
		$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
		if(mysqli_connect_errno()){
			die("Database connection FAILED");
		}
	} 
	function make_db_for_user($name)
	{
		global $connection;
		$query	 = "CREATE TABLE '{$name}\'s_inventory' (";
		$query	.= " 'art_nr' int(11) NOT NULL, ";
		$query	.= " 'amount_of' int(5) NULL, ";
		$query 	.= " 'amount_sold' int(11) NULL, ";
		$query	.= " 'total_sell_price' int(11) NULL, ";
		$query	.= " 'total_buy_price' int(11) NULL, ";
		$query	.= " 'total_profit' int(11) NULL, ";
		$query	.= " 'total_products' int(11) NULL,";
		mysql_query($connection, $query);
		mysqli_real_escape_string($query);
	}
?>