<?php
	
	class Document
	{
		protected $reference;
		protected $nom;
		protected $dateCreation;
		protected $prix;
		protected $auteur;

		function __construct($reference, $nom, $dateCreation, $prix, $auteur)
		{
			$this->reference = $reference;
			$this->nom = $nom;
			$this->dateCreation = $dateCreation;
			$this->prix = $prix;
			$this->auteur = $auteur;
		}
		//getters
		function getReference() {return $this->reference;}
		function getNom() { return $this->nom;}
		function getDateCreation() { return $this->dateCreation;}
		function getPrix() { return $this->prix;}
		function getAuteur() { return $this->auteur;}
		//setters
		function setReference($reference) { $this->reference = $reference;}
		function setNom($nom) { $this->nom = $nom;}
		function setDateCreation($dateCreation) { $this->dateCreation = $dateCreation;}
		function setPrix($prix) { $this->prix = $prix;}
		function setAuteur($auteur) { $this->auteur = $auteur;}
		//CRUD
		public function insertDocument($document, $conn)
		{
			/*$req = "INSERT INTO `document`(`reference`, `nom`, `date_creation`, `prix`, `auteur`) VALUES
			 ('".$document->getReference()."','".$document->getNom()."','".$document->getDateCreation()."','".$document->getPrix()."','".$document->getAuteur()."')";
			$conn->exec($req);*/
			/*$req = "INSERT INTO `document`(`reference`, `nom`, `date_creation`, `prix`, `auteur`) VALUES
			 ('".addslashes($document->getReference())."','".$document->getNom()."','".$document->getDateCreation()."','".$document->getPrix()."','".$document->getAuteur()."')";
			$conn->exec($req);*/
		try{
			$stmt = "INSERT INTO `document`(`reference`, `nom`, `date_creation`, `prix`, `auteur`) VALUES (:reference,:nom,:date_creation,:prix,:auteur)";
			$ps=$conn->prepare($stmt);


			$ps->bindParam(':reference',$reference);
			$ps->bindParam(':nom',$nom,PDO::PARAM_STR);
			$ps->bindParam(':date_creation',$date_creation,PDO::PARAM_STR);
			$ps->bindParam(':prix',$prix,PDO::PARAM_STR);
			$ps->bindParam(':auteur',$auteur,PDO::PARAM_STR);

			$reference=addslashes($document->getReference());
			$nom=$document->getNom();
			$date_creation=$document->getDateCreation();
			$prix=$document->getPrix();
			$auteur=$document->getAuteur();

			$ps->execute();
			}catch(PDOException $error)
			{
				echo $error->getMessage();
			}
		}

		// public static function getAll($conn)
		// {
		// 	$req = $conn->prepare("SELECT * from document; ") ;
		// 	$req->execute($req);

		// 	$donnees=$req->fetch();
		// 	return $donnees
		// }

		public static function afficherDocument($conn)
		{
			//$req = "SELECT * FROM `document` " ;
			//$req = "SELECT * FROM document d left join livre l on l.id_doc=d.reference where l.id_doc is null" ;

			//affiche les documents SEULEMENT
			$req = "SELECT * FROM document d 
			left join livre l 
			on l.id_doc=d.reference 
			left join cd 
			on cd.id_cd=d.reference 
			where l.id_doc is null  
			and cd.id_cd is null" ;

			$list = $conn->query($req); // query = exec
			return $list->fetchAll();
		}

		public static function supprimerDocument($reference,$conn)
		{
			$req = "DELETE FROM `document` WHERE reference= '".addslashes($reference)."';";
			$conn->exec($req);
		}

		public function updateDocument($document,$conn)
		{
			$req = "UPDATE `document` SET `nom`='".$document->getNom()."',`date_creation`='".$document->getDateCreation().
			"',`prix`='".$document->getPrix()."',`auteur`='".$document->getAuteur()."' WHERE `reference`='".$document->getReference()."';";
			$conn->exec($req);
		}



	}

?>