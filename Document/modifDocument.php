<?php

	if (isset($_POST["ref"]))
	{
		include("Document.php"); // pour pouvoir utiliser l'objet Document
	include("../config.php");

	$ref = $_POST['ref'];
	$nom = $_POST['nom'];
	$date = $_POST['date'];
	$prix = $_POST['prix'];
	$auteur = $_POST['auteur'];

	$c = new config();
	$conn = $c->getConnexion();

	$document = new Document($ref, $nom, $date, $prix, $auteur);
	$document->updateDocument($document,$conn);

	echo 'update effectué avecc succcès';
	echo '<br/><a href="afficheDocument.php">afficher</a>';

	}
	if (isset($_GET["r"])){

	$reference = $_GET['r'];
	$nom = $_GET['n'];
	$date_creation = $_GET['d'];
	$prix = $_GET['p'];
	$auteur = $_GET['a'];
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"> 
		<link rel="stylesheet" type="text/css" href="../styleTableau.css">
	</head>

	<body>
		<form action="modifDocument.php" method="POST">
			<table>
				   <tr>
				       <th>Référence</th>
				       <th>Nom</th>
				       <th>Date</th>
				       <th>Prix</th>
				       <th>Auteur</th>
				   </tr>
				   <tr>
				   		<td><?php echo $reference;?>
				   			<input type="hidden" name="ref" <?php echo "value='".$_GET["r"]."'" ?> > 
				   		</td>
				   		<td><input type="text" name="nom" value="<?php echo $nom;?>"></td>
				   		<td><input type="text" name="date" value="<?php echo $date_creation;?>"></td>
				   		<td><input type="text" name="prix" value="<?php echo $prix;?>"></td>
				   		<td><input type="text" name="auteur" value="<?php echo $auteur;?>"></td>
				   </tr>

			</table>
			<input type="submit" value="enregistrer">
		</form>
	</body>
</html>

<?php } ?>