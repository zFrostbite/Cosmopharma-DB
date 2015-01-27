<?php
	function connect_to_db()
	{
		mysqli_connect("127.0.0.1", "root", "", "cosmopharma");
		if(mysqli_connect_errno())
		{
			die("FATAL ERROR: Could not establish a connection to target mySQL server. ERROR: ") . mysqli_connect_error() .
			echo "ERRNO: " . mysqli_connect_errno();
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