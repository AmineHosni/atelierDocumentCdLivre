<?php
	include("../Document/Document.php");

	class Livre extends document
	{
		protected $nbPages;

		function __construct($reference, $nom, $dateCreation, $prix, $auteur, $nbPages)
		{
			parent::__construct($reference, $nom, $dateCreation, $prix, $auteur);
			$this->nbPages = $nbPages;
		}

		public function getNbPages() { return $this->nbPages ;}
		public function setNbPages($nbPages) { $this->nbPages = $nbPages; }

		public function insertLivre($livre, $conn)
		{
			parent::insertDocument($livre, $conn);
			$req = "INSERT INTO `livre`(`id_doc`, `nbPages`) VALUES ('".$livre->getReference()."','".$livre->getNbPages()."')";
			$conn->exec($req);
		}
		public static function afficherLivre($conn)
		{
			$req = "SELECT reference, nom, date_creation, prix, auteur, nbPages from document, livre WHERE document.reference = livre.id_doc ;";
			$list = $conn->query($req);
			return $list->fetchAll();
		}
		public static function supprimerLivre($reference, $conn)
		{
			$req = "DELETE FROM `livre` WHERE id_doc= '$reference';";
			$conn->exec($req);
			parent::supprimerDocument($reference, $conn);
		}
		public function updateLivre($livre, $conn)
		{
			$req = "UPDATE `livre` SET `nbPages`='".$this->getNbPages()."'where id_doc = '".$livre->getReference()."';";
			parent::updateDocument($livre, $conn);
			$conn->exec($req);
		}
	}

?>