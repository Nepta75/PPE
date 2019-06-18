<?php
	require ("modele/modele.php");
	class Controleur
	{
		private $unModele ;

		public function __construct ($serveur, $bdd, $user, $mdp)
		{
			//instaniation de la classe Modele
			$this->unModele = new Modele ($serveur, $bdd, $user, $mdp);
		}

		public function connexion($user, $mdp) {
			if($this->unModele->connexion($user, $mdp) == null ) {
				return null;
			} else {
				$resultat = $this->unModele->connexion($user, $mdp);
				$_SESSION['pseudo'] = $resultat['pseudo'];
				$_SESSION['nom'] = $resultat['nom'];
				$_SESSION['prenom'] = $resultat['prenom'];
				$_SESSION['tel'] = $resultat['tel'];
				$_SESSION['idclient'] = $resultat['idclient'];
				$_SESSION['id_user'] = $resultat['iduser'];
				$_SESSION['mdp'] = $resultat['mdp'];
				$_SESSION['email'] = $resultat['email'];
				$_SESSION['admin_lvl'] = intval($resultat['admin_lvl']);

				if ($resultat['admin_lvl'] == 0) {
					header("Location:index.php");
					exit();
				} elseif ($resultat['admin_lvl'] > 0) {
					header("Location:admin.php?c=1");
					exit();
				}
			}
		}

		public function inscription($tab) {
			$this->unModele->inscription($tab);
		}

		public function selectAllUsers(){
			$resultat = $this->unModele->selectAllUsers();
			return $resultat;
		}

		public function selectUser($id) {
			return $this->unModele->selectUser($id);
		}

		public function selectAllVehiculesNeuf() {
			return $this->unModele->selectAllVehiculesNeuf();
		}
		
        public function selecttreeVehiculesNeuf() {
			return $this->unModele->selecttreeVehiculesNeuf();

		}

		public function selectAllVehiculesOccasion() {
			return $this->unModele->selectAllVehiculesOccasion();
		}

		public function selecttreeVehiculesOccasion() {
			return $this->unModele->selecttreeVehiculesOccasion();
			
		}

		public function selectAllVehiculesOccasionDispo() {
			return $this->unModele->selectAllVehiculesOccasionDispo();
		}

		public function selectAllVehiculesOccasionIndispo() {
			return $this->unModele->selectAllVehiculesOccasionIndispo();
		}

		public function selectAllVehiculesClient() {
			return $this->unModele->selectAllVehiculesClient();
		}

		public function selectVehiculeClient($iduser) {
			return $this->unModele->selectVehiculeClient($iduser);
		}

		public function selectVehicule($immatriculation) {
			return $this->unModele->selectVehicule($immatriculation);
		}

		//Devis

		public function selectDevis($id) {
			return $this->unModele->selectDevis($id);
		}

		public function insertDevis($data) {
			$this->unModele->insertDevis($data);
		}
		
		public function insertVehiculeClient($tab) {
			$this->unModele->insertVehiculeClient($tab);
		}

		public function deleteVehiculeClient($idvehiculeclient) {
			$this->unModele->deleteVehiculeClient($idvehiculeclient);
		}
	}
 ?>