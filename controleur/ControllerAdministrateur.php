<?php
    require_once MODEL."ModeleAdmin.php";
    class ControllerAdministrateur {
        private $modeleAdmin;
        
        public function __construct ($serveur, $bdd, $user, $mdp) {
            $this->modeleAdmin = new ModeleAdmin ($serveur, $bdd, $user, $mdp);
        }


        //---------------------- Utils -----------------------\\

        public function verifImmat($immat) {
            $result = $this->modeleAdmin->verifImmat($immat);
            if (count($result) > 1) {
                return false;
            } 
            return true;
        }

        public function countFromTable($table) {
            return $this->modeleAdmin->countFromTable($table);
        }

        //-------------------- Les sélections --------------------\\

        public function selectAllClients() {
            return $this->modeleAdmin->selectAllClients();
        }

        public function selectClient($id) {
            return $this->modeleAdmin->selectClient($id);
        }

        public function selectAllTechniciens(){
			$resultat = $this->modeleAdmin->selectAllTechniciens();
			return $resultat;
        }
        
        public function selectAllAdmins(){
            $resultat = $this->modeleAdmin->selectAllAdmins();
            return $resultat;
        }

        public function selectAllVehNeufs(){
            $resultat = $this->modeleAdmin->selectAllVehNeufs();
            return $resultat;
        }

        public function selectAllVehOccas(){
            $resultat = $this->modeleAdmin->selectAllVehOccas();
            return $resultat;
        }

        public function selectAllVehClients(){
            $resultat = $this->modeleAdmin->selectAllVehClients();
            return $resultat;
        }

        public function selectAllDevis(){
            $resultat = $this->modeleAdmin->selectAllDevis();
            return $resultat;
        }

        public function selectIdVehicule($immatriculation) {
            $resultat = $this->modeleAdmin->selectIdVehicule($immatriculation);
            return $resultat;
        }

        //------------------ Suppresion de véhicule ---------------- \\ 

        public function deleteVehicule($id) {
            $this->modeleAdmin->deleteVehicule($id);
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

        public function deleteDevis($id){
            $this->modeleAdmin->deleteDevis($id);
        }
        public function deleteEssayer($id){
            $this->modeleAdmin->deleteEssayer($id);
        }

        public function selectUser($id) {
           return $this->modeleAdmin->selectUser($id);
        }

        public function updateInscription($tab, $id) {
            $this->modeleAdmin->updateInscription($tab, $id);
        }

        public function udapteEssayer($data) {
            $this->modeleAdmin->udapteEssayer($data);
        }

        public function updateStatutDevis($data) {
            $this->modeleAdmin->updateStatutDevis($data);
        }

        //--------------------- Modification d'un vehicule par immatriculation ----------------------- \\

        public function updateVehiculeNeuf($data) {
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
            $id = $this->selectIdVehicule($immatriculation);
            if(!empty($marque) && !empty($immatriculation) && !empty($type) && !empty($modele)
                && !empty($cylindree) && !empty($energie) && !empty($typeBoite) && !empty($prix) 
                && !empty($img1)
            )
            {
                $this->modeleAdmin->updateVehiculeNeuf($id, $marque, $immatriculation, $type, $modele, $cylindree,
                    $energie, $typeBoite, $prix, $img1, $img2
                );
                echo "<div class='succes'>Succès : Modification réussi !</div>";
            } else {
                echo "<div class='erreur'>Erreur : Veuillez remplir tous les champs !</div>";
            }
        }

        public function updateVehiculeOccas($data) {
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
            $id = $this->selectIdVehicule($immatriculation);
            if (!empty($marque) && !empty($immatriculation) && !empty($type) && !empty($modele)
                && !empty($cylindree) && !empty($energie) && !empty($typeBoite) && !empty($km) && !empty($etat)
                && !empty($prix) && !empty($date_imma) && !empty($img1)) {
                $this->modeleAdmin->updateVehiculeOccas($id, $marque, $modele, $date_imma, $immatriculation,
                    $type, $cylindree ,$energie, $typeBoite, $etat, $info, $km, $prix, $img1, $img2);
                echo "<div class='succes'>Succès : Modification réussi !</div>";
            } else {
                echo "<div class='erreur'>Erreur : Veuillez remplir tous les champs !</div>";
            }
        }

        public function updateVehiculeClient($data) {
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
            $id = $this->selectIdVehicule($immatriculation);

            if (!empty($user) && !empty($marque) && !empty($modele) && !empty($date_imma) && !empty($immatriculation)
                && !empty($type) && !empty($cylindree) && !empty($energie) && !empty($typeBoite) && !empty($etat) 
                && !empty($km) && !empty($img1)) {
                    $this->modeleAdmin->updateVehiculeClient($user, $id, $marque, $modele, $date_imma, $immatriculation, $type
                        ,$cylindree, $energie, $typeBoite, $etat, $info, $km, $img1, $img2);
                    echo "<div class='succes'>Succès : Modification réussi !</div>";
            } else {
                    echo "<div class='erreur'>Veuillez remplir tous les champs !</div>";
            }
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

        public function selectEssai($id) {
            return $this->modeleAdmin->selectEssai($id);
        }

        public function confirmEssai($idessayer) {
            $this->modeleAdmin->confirmEssai($idessayer);
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