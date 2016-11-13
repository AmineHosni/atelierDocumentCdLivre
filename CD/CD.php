<?php
	include_once('../Document/Document.php');

	class CD extends Document
	{
		protected $duree;
		protected $capacite;

		public function getDuree() { return $this->duree ;}
		public function getCapacite() { return $this->capacite; }

		public function setDuree($duree) { $this->duree = $duree; }
		public function setCapacite($capacite) { $this->capacite = $capacite; }

		public function __construct($reference, $nom, $dateCreation, $prix, $auteur, $duree, $capacite)
		{
			parent::__construct($reference, $nom, $dateCreation, $prix, $auteur);

			$this->duree = $duree;
			$this->capacite = $capacite;
		}
		public function insertCD($cd, $conn)
		{
			parent::insertDocument($cd, $conn);
			$req = "INSERT INTO `cd`(`id_cd`, `duree`, `capacite`) VALUES ('".$cd->getReference()."','".$cd->getDuree()."','".$cd->getCapacite()."');";
			$conn->exec($req);
		}
		public static function afficheCD($conn)
		{
			$req = "SELECT reference, nom, date_creation, prix, auteur, duree, capacite from document, cd WHERE document.reference = cd.id_cd ;";
			$list = $conn->query($req);
			return $list->fetchAll();
		}
		public function supprimerCD($reference, $conn)
		{
			$req = "DELETE FROM `cd` WHERE id_cd= '$reference';";
			$conn->exec($req);
			parent::supprimerDocument($reference, $conn);
		}
		public function updateCD($cd, $conn)
		{
			$req = "UPDATE `cd` SET `duree`='".$this->getDuree()."',`capacite`= '".$this->getCapacite()."'WHERE id_cd = '".$cd->getReference()."' ;";
			parent::updateDocument($cd, $conn);
			$conn->exec($req);
		
	}
}

?>