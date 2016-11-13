<?php
	if(!empty($_GET['q']))
	{
		include('../config.php');

		$q=$_GET['q'];

		$c=new config();
		$conn=$c->getConnexion();

		//$req="select reference from document, cd where document.reference=cd.id_cd and cd.id_cd like '%".$q."%';";
		$req="select * from document, cd where document.nom like '%".addslashes($q)."%' and document.reference=cd.id_cd;";

		$row=$conn->query($req);
		$result=$row->fetchAll();

		foreach ($result as $r) {
			//echo '<a class="link" href="recherche.php?ref='.$r['reference'].'">'.$r['reference'].'</a>';
			echo '<option value="'.$r['reference'].'" onclick="showResults(this.value)" >'.$r['nom'].'</option>';
		}
	}

?>