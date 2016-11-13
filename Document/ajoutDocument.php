<?php
	// pour vérifier ce je récupère bien les caluers print_r($_POST);exit(); exit <=> débogueur, ne poursuit pas l'execution
	//recupération des champs depuis le formulaire
	include("Document.php"); // pour pouvoir utiliser l'objet Document
	include("../config.php");

	$ref = $_POST['ref'];
	$nom = $_POST['nom'];
	$date = $_POST['date'];
	$prix = $_POST['prix'];
	$auteur = $_POST['auteur'];

	//instantiation
	$c = new config();
	$conn = $c->getConnexion();
	$document = new Document($ref, $nom, $date, $prix, $auteur);
	$document->insertDocument($document,$conn);
	
eval("echo '".addslashes($nom)."';");
	
?>
<br/><a href="afficheDocument.php">afficher</a>