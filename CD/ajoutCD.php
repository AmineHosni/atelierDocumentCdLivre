<link rel="stylesheet" type="text/css" href="../styleTableau.css">
<?php
	include_once('CD.php');
	include_once('../config.php');

	$ref = $_POST['ref'];
	$nom = $_POST['nom'];
	$date = $_POST['date'];
	$prix = $_POST['prix'];
	$auteur = $_POST['auteur'];
	$duree = $_POST['duree'];
	$capacite = $_POST['capacite'];


	$c = new config();
	$conn = $c->getConnexion();

	$cd = new CD($ref, $nom, $date, $prix, $auteur, $duree, $capacite);
	$cd->insertCD($cd,$conn);

	echo 'CD ajouté avec succés ! <br/>';
	echo '<br/><a href="afficheCD.php">afficher</a>'
?>