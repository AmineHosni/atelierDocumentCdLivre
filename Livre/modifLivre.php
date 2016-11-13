<?php

	if (isset($_POST['ref']))
	{
		include_once('../config.php');
		include_once('Livre.php');

		$ref = $_POST['ref'];
		$nom = $_POST['nom'];
		$date = $_POST['date'];
		$prix = $_POST['prix'];
		$auteur = $_POST['auteur'];
		$nbPages = $_POST['nbPages'];

		$c = new config();
		$conn = $c->getConnexion();

		$livre = new Livre($ref, $nom, $date, $prix, $auteur, $nbPages);
		$livre->updateLivre($livre, $conn);

		echo 'update effectué avecc succcès';
		echo '<br/><a href="afficheLivre.php">afficher</a>';
	}
	if (isset($_GET['r']))
	{
		$reference = $_GET['r'];
		$nom = $_GET['n'];
		$date_creation = $_GET['d'];
		$prix = $_GET['p'];
		$auteur = $_GET['a'];
		$nbPages = $_GET['np'];

		?>

		<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"> 
		<link rel="stylesheet" type="text/css" href="../styleTableau.css">
	</head>
</style>

	<body>
		<form action="modifLivre.php" method="POST">
			<table>
				   <tr>
				       <th>Référence</th>
				       <th>Nom</th>
				       <th>Date</th>
				       <th>Prix</th>
				       <th>Auteur</th>
				       <th>Nombre de Pages</th>
				   </tr>
				   <tr>
				   		<td><?php echo $reference;?>
				   			<input type="hidden" name="ref" <?php echo "value='".$_GET["r"]."'" ?> > 
				   		</td>
				   		<td><input type="text" name="nom" value="<?php echo $nom;?>"></td>
				   		<td><input type="text" name="date" value="<?php echo $date_creation;?>"></td>
				   		<td><input type="text" name="prix" value="<?php echo $prix;?>"></td>
				   		<td><input type="text" name="auteur" value="<?php echo $auteur;?>"></td>
				   		<td><input type="text" name="nbPages" value="<?php echo $nbPages;?>"></td>
				   </tr>

			</table>
			<input type="submit" value="enregistrer">
		</form>
	</body>
</html>

		<?php

	}

?>