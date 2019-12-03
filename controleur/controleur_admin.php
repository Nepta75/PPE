<?php
    require_once "modele/modele_admin.php";
    class Administrateur {
        private $modeleAdmin;
        
        public function __construct () {
            $this->modeleAdmin = new ModeleAdmin ();
        }


        //---------------------- Utils -----------------------\\

        public function verifImmat($immat) {
            $result = $this->modeleAdmin->verifImmat($immat);
            if (count($result) > 1) {
                return false;
            } 
            return true;
        }

        public function selectAllClients() {
            return $this->modeleAdmin->selectAllClients();
        }


        //---------------------- Ajout Véchicule -----------------------\\

        public function addVehiculeNeuf($data) {
            $marque = htmlspecialchars($data['marque']);
            $immatriculation = htmlspecialchars($data['immatriculation']);
            $type = $data['type'];
            $modele = htmlspecialchars($data['modele']);
            $cylindree = intval($data['cylindree']);
            $energie = $data['energie'];
            $typeBoite = $data['typeBoite'];
            $prix = floatval($data['prix']);
            $img1 = htmlspecialchars($data['img1']);
            $img2 = htmlspecialchars($data['img2']);
            echo $this->verifImmat($immatriculation);
            if(!empty($marque) && !empty($immatriculation) && !empty($type) && !empty($modele)
                && !empty($cylindree) && !empty($energie) && !empty($typeBoite) && !empty($prix) 
                && !empty($img1)
            )
            {
                if ($this->verifImmat($immatriculation)) {
                    $this->modeleAdmin->addVehiculeNeuf($marque, $immatriculation, $type, $modele, $cylindree,
                        $energie, $typeBoite, $prix, $img1, $img2
                    );
                    echo "<div class='succes'>Succès : Vous venez d'ajouter un nouveau Véhicule neuf !</div>";
                } else {
                    echo "<div class='erreur'>Erreur : Un véhicule existe déjà avec cette immatriculation</div>";
                }
            } else {
                echo "<div class='erreur'>Erreur : Veuillez remplir tous les champs !</div>";
            }
        }

        public function addVehiculeOccas($data) {
            $marque = htmlspecialchars($data['marque']);
            $immatriculation = htmlspecialchars($data['immatriculation']);
            $type = $data['type'];
            $modele = htmlspecialchars($data['modele']);
            $cylindree = intval($data['cylindree']);
            $energie = $data['energie'];
            $typeBoite = $data['typeBoite'];
            $km = intval($data['km']);
            $etat = $data['etat'];
            $info = $data['info'];
            $prix = floatval($data['prix']);
            $date_imma = $data['dateImma'];
            $img1 = htmlspecialchars($data['img1']);
            $img2 = htmlspecialchars($data['img2']);

            if (!empty($marque) && !empty($immatriculation) && !empty($type) && !empty($modele)
                && !empty($cylindree) && !empty($energie) && !empty($typeBoite) && !empty($km) && !empty($etat)
                && !empty($prix) && !empty($date_imma) && !empty($img1)) {
                if ($this->verifImmat($immatriculation)) {
                    $this->modeleAdmin->addVehiculeOccas($marque, $modele, $date_imma, $immatriculation,
                    $type, $cylindree ,$energie, $typeBoite, $etat, $info, $km, $prix, $img1, $img2);
                    echo "<div class='succes'>Succès : Vous venez d'ajouter un nouveau Véhicule d'occasion !</div>";
                } else {
                    echo "<div class='erreur'>Erreur : Un véhicule existe déjà avec cette immatriculation</div>";
                }
            } else {
                echo "<div class='erreur'>Erreur : Veuillez remplir tous les champs !</div>";
            }
        }

        public function addVehiculeClient($data) {
            $user = htmlspecialchars($data['user']);
            $marque = htmlspecialchars($data['marque']);
            $modele = htmlspecialchars($data['modele']);
            $date_imma = $data['dateImma'];
            $immatriculation = htmlspecialchars($data['immatriculation']);
            $type = $data['type'];
            $cylindree = intval($data['cylindree']);
            $energie = $data['energie'];
            $typeBoite = $data['typeBoite'];
            $etat = $data['etat'];
            $info = $data['info'];
            $km = intval($data['km']);
            $img1 = $data['img1'];
            $img2 = $data['img2'];

            if (!empty($user) && !empty($marque) && !empty($modele) && !empty($date_imma) && !empty($immatriculation)
                && !empty($type) && !empty($cylindree) && !empty($energie) && !empty($typeBoite) && !empty($etat) 
                && !empty($km) && !empty($img1)) {
                if ($this->verifImmat($immatriculation)) {
                    $this->modeleAdmin->addVehiculeClient($user, $marque, $modele, $date_imma, $immatriculation, $type
                        ,$cylindree, $energie, $typeBoite, $etat, $info, $km, $img1, $img2);
                    echo "<div class='succes'>Succès : Vous venez d'ajouter un nouveau Véhicule client !</div>";
                } else {
                    echo "<div class='erreur'>Erreur : Un véhicule existe déjà avec cette immatriculation</div>";
                }
            } else {
                    echo "<div class='erreur'>Veuillez remplir tous les champs !</div>";
            }
        }

        public function deleteUser($id){
            $this->modeleAdmin->deleteUser($id);
        }

        public function selectUser($id) {
           return $this->modeleAdmin->selectUser($id);
        }

        public function updateInscription($tab, $id) {
            $this->modeleAdmin->updateInscription($tab, $id);
        }

        //--------------------- Modification d'un vehicule par immatriculation ----------------------- \\

        public function updateVehicule() {
            if (isset($_POST['immatriculation'])) {
                if (isset($_POST['immatriculation'])) {
                    if ($this->verifImmat($_POST['immatriculation']) !== false) {
                        $result = $this->modeleAdmin->selectVehicule($_POST['immatriculation']);
                        if($result != null) {
                            echo "<h3 style='margin-top: 100px; text-align:center'>Modification d'un vehicule ".$result['type']."</h3>";
                            $resultat = $result['data'];
                            if ($result['type'] == 'neuf') {
                                require "vue/vue_modifier_vehicule_neuf.php";
                            } elseif ($result['type'] == 'occas') {
                                require "vue/vue_modifier_vehicule_occas.php";
                            } else {
                                $clients = $this->selectAllClients();
                                require "vue/vue_modifier_vehicule_client.php";
                            }
                        } else {
                            $erreur = "Erreur : Véhicule introuvable !";
                        }
                    }
                } else {
                    $erreur = "Erreur : L'immatriculation est manquante";
                }
                if (isset($erreur)) {
                    echo $erreur;
                    require "vue/vue_modifier_vehicule.php";
                }
            } else {
                require "vue/vue_modifier_vehicule.php";
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

        // ESSAYER VEHICULE

        public function insertEssayer($tab, $idVehicule, $idclient) {
            $this->modeleAdmin->insertEssayer($tab, $idVehicule, $idclient);
        }

        public function selectAllEssai(){
            return $this->modeleAdmin->selectAllEssai();
        }

        public function confirmEssai($idessayer) {
            $this->modeleAdmin->confirmEssai($idessayer);
        }

        public function deleteEssayer($id) {
            $this->modeleAdmin->deleteEssayer($id);
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