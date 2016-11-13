<?php
	if(!empty($_GET['q']))
	{
		include('../config.php');

		$q=$_GET['q'];

		$c=new config();
		$conn=$c->getConnexion();

		//$req="select reference from document where reference like '%".$q."%';";

		//suggeste suelement les livres (pas de CD ni de Livres)
		$req="select reference from document d left join livre l 
			on l.id_doc=d.reference 
			left join cd 
			on cd.id_cd=d.reference 
			where l.id_doc is null  
			and cd.id_cd is null
			and d.reference like '%".addslashes($q)."%' ;";

		$row=$conn->query($req);
		$result=$row->fetchAll();

		foreach ($result as $r) {
			//echo '<a class="link" href="recherche.php?ref='.$r['reference'].'">'.$r['reference'].'</a>';
			echo '<option onclick="showResults(this.value)" >'.$r['reference'].'</option>';
		}
	}

?>