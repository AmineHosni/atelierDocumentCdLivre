<?php
	include_once('Livre.php');
	include_once('../config.php');


	$ref = $_POST['ref'];
	$nom = $_POST['nom'];
	$date = $_POST['date'];
	$prix = $_POST['prix'];
	$auteur = $_POST['auteur'];
	$pages = $_POST['pages'];


	$c = new config();
	$conn = $c->getConnexion();

	$livre = new Livre($ref, $nom, $date, $prix, $auteur, $pages);
	$livre->insertLivre($livre,$conn);

	echo 'insertion de livre : success !';
	echo '<br/><a href="afficheLivre.php">afficher</a>'

?>