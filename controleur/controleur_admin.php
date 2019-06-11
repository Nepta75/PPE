<?php
    require_once "modele/modele_admin.php";
    class Administrateur {
        private $modeleAdmin;
        
        public function __construct ($serveur, $bdd, $user, $mdp) {
            $this->modeleAdmin = new ModeleAdmin ($serveur, $bdd, $user, $mdp);
        }

        public function addVehiculeNeuf($immatriculation, $type, $modele, $millesime, $cylindree,
        $energie, $typeBoite, $prix, $date_imma, $url_img) {
            $this->modeleAdmin->addVehiculeNeuf($immatriculation, $type, $modele, $millesime, $cylindree,
            $energie, $typeBoite, $prix, $date_imma, $url_img);
        }

        public function addVehiculeOccas($immatriculation, $type, $modele, $millesime, $cylindree
        ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img) {
            $this->modeleAdmin->addVehiculeOccas($immatriculation, $type, $modele, $millesime, $cylindree
            ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img);
        }

        public function addVehiculeClient($user, $immatriculation, $type, $modele, $millesime, $cylindree
        ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img){
            $this->modeleAdmin->addVehiculeClient($user, $immatriculation, $type, $modele, $millesime, $cylindree
            ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img);
        }

        public function verifAdmin() {
			if(isset($_SESSION['admin_lvl'])) {
				if($_SESSION['admin_lvl'] > 0) {
					return true;
				}
			}
		}
    }
?>