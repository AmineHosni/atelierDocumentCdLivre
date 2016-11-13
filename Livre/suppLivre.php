<?php
	include_once('../config.php');
	include_once('Livre.php');
	
	$reference = $_GET['r'];

	$c = new config();
	$conn = $c->getConnexion();

	Livre::supprimerLivre($reference, $conn);

	header('location:afficheLivre.php');
	



?>