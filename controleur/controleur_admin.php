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

        //MODIFICATION VEHICULE

        public function verifVehicule($data) {
            if(isset($data['immatriculation']) && isset($data['type_modif'])) {
                if (!empty($data['immatriculation']) && !empty($data['type_modif'])) {
                    $resultat = $this->modeleAdmin->selectVehicule($data);
                    if($resultat == null) {
                        $erreur = "Erreur : Véhicule introuvable !";
                    }
                } else {
                    $erreur = "Erreur : Veuillez remplire tous les champs !";
                }
            }
            if(isset($erreur)) {
                return $erreur;
            }
            
        }

        public function updateVehiculeNeuf($immatriculation, $type, $modele, $millesime, $cylindree
        ,$energie, $typeBoite, $prix, $date_imma, $url_img) {
            $this->modeleAdmin->updateVehiculeNeuf($immatriculation, $type, $modele, $millesime, $cylindree
            ,$energie, $typeBoite, $prix, $date_imma, $url_img);
        }

        public function updateVehiculeOccas($immatriculation, $type, $modele, $millesime, $cylindree
        ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img) {
            $this->modeleAdmin->updateVehiculeOccas($immatriculation, $type, $modele, $millesime, $cylindree
            ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img);
        }

        public function updateVehiculeClient($user, $immatriculation, $type, $modele, $millesime, $cylindree
        ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img) {
            $this->modeleAdmin->updateVehiculeClient($user, $immatriculation, $type, $modele, $millesime, $cylindree
            ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img);
        }

        // SUPRESSION VEHICULE

        public function deleteVehiculeNeuf($immat) {
            $this->modeleAdmin->deleteVehiculeNeuf($immat);
        }

        public function deleteVehiculeOccasion($immat) {
            $this->modeleAdmin->deleteVehiculeOccasion($immat);
        }

        public function deleteVehiculeClient($immat) {
            $this->modeleAdmin->deleteVehiculeClient($immat);
        }

        public function selectVehicule($resultat) {
            return $this->modeleAdmin->selectVehicule($resultat);
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