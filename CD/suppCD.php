<?php
	include_once('../config.php');
	include_once('CD.php');
	
	$reference = $_GET['r'];

	$c = new config();
	$conn = $c->getConnexion();

	CD::supprimerCD($reference, $conn);

	header('location:afficheCD.php');



?>