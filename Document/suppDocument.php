<?php

	$reference = $_GET['r'];
	//echo $reference;
	include("../config.php");
	include("Document.php");

	 	$c = new config();
      	$conn = $c->getConnexion();

     	//$doc = new Document("d","a",2016-10-8,"d","dff");
     	
     	Document::supprimerDocument($reference,$conn);

     	header('location:afficheDocument.php');
?>