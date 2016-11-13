<link rel="stylesheet" type="text/css" href="../styleTableau">

				<table>
	<tr>
       <th>Référence</th>
       <th>Nom</th>
       <th>Date</th>
       <th>Prix</th>
       <th>Auteur</th>
	</tr>
<?php
	
		$ref=$_GET['ref'];

		include_once('../config.php');

		$c = new config();
		$conn = $c->getConnexion();

		$req = "select * from document where reference like '%".addslashes($ref)."%'; ";
		$row = $conn->query($req);
		$result=$row->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $r) {

			?>
					
				<tr>
					<td><?php echo $r['reference'] ?></td>
		        	<td><?php echo $r['nom'] ?></td>
		          	<td><?php echo $r['date_creation'] ?></td>
		          	<td><?php echo $r['prix'] ?></td>
		          	<td><?php echo $r['auteur'] ?></td>
		          	<td><a href="suppDocument.php?r=<?php echo $r['reference']; ?>" onclick="return confirm('Êtes-vous sûre ?')" ><input type="button" value="Supprimer"></a></td>
          			<td><a href="modifDocument.php?r=<?php echo $r['reference']; ?>&amp;n=<?php echo $r['nom']; ?>&amp;d=<?php echo $r['date_creation']; ?>
            		&amp;p=<?php echo $r['prix']; ?>&amp;a=<?php echo $r['auteur']; ?>"><input type="button" value="Modifier"></a></td>
          		</tr>

			<?php
		}
		?>
          	</table>








