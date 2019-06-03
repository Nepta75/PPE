<?php
	//appelle le modèle
	require_once ("modele/modele.php");
	class Controleur
	{
		private $unModele ;

		public function __construct ($serveur, $bdd, $user, $mdp)
		{
			//instaniation de la classe Modele
			$this->unModele = new Modele ($serveur, $bdd, $user, $mdp);
		}

		public function selectEvents()
		{
			$resultats = $this->unModele->selectAll();
			//on peut réaliser des traitements avant l'affichage 

			return $resultats;
		}

		public function insertEvent($tab)
		{
			$this->unModele->insertEvent($tab);
		}

		public function deleteEvent($idevent)
		{
			//on peut réaliser des contrôles sur l'idproduit
			$this->unModele->deleteEvent($idevent);
		}

		public function verifConnexion ($login , $mdp)
		{
			// on peut controler les données avant leur envoi au modele
			return $this->unModele->verifConnexion($login , $mdp);
		}

		public function insertCategorie ($tab)
		{
			$this->unModele->insertCategorie($tab);	
		}
		public function deleteCategorie ($idcategorie)
		{
			$this->unModele->deleteCategorie($idcategorie);
		}

		public function selectCategories ()
		{
			return $this->unModele->selectCategories();
		}

		public function insertStaff ($tab)
		{
			$this->unModele->insertStaff($tab);
		}

		public function deleteStaff ($idstaff)
		{
			$this->unModele->deleteStaff($idstaff);
		}

		public function selectStaff ()
		{
			return $this->unModele->selectStaff();
		}
	}
 ?>