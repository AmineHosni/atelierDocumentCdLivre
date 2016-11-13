<?php
	if(!empty($_GET['q']))
	{
		include('../config.php');

		$q=$_GET['q'];

		$c=new config();
		$conn=$c->getConnexion();

		$req="select reference from document, livre where document.reference=livre.id_doc and livre.id_doc like '%".$q."%';";

		$row=$conn->query($req);
		$result=$row->fetchAll();

		foreach ($result as $r) {
			//echo '<a class="link" href="recherche.php?ref='.$r['reference'].'">'.$r['reference'].'</a>';
			echo '<option onclick="showResults(this.value)" >'.$r['reference'].'</option>';
		}
	}

?>