<?php
	
	class config
	{
		function getConnexion()
		{
			$servername = "localhost";
			$username = "root";
			$dbname = "atelier3";
			$password = "";

			$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
			return $conn;
		}

	}

?>