<?php
require_once MODEL.'Model.php';
include_once CONTROLLER.'ControllerAdministrateur.php';

class Controller {

    protected $model;
    protected $cAdmin;

    public function __construct() {
        $this->model = new Model('localhost', 'bmwv2', 'root', '');
        $this->cAdmin = new ControllerAdministrateur('localhost', 'bmwv2', 'root', '');
    }

    public function renderHeader() {
        $admin = $this->cAdmin->verifAdmin();
        include_once VIEW.'components/header.php';
    }

    public function renderFooter() {
        include_once VIEW.'components/footer.php';
    }

    public function selectAdmin($id) {
        return $this->model->selectAdmin($id);
    }

    public function connexion($user, $mdp) {
        $isAdmin = false;
        if($this->model->connexion($user, $mdp) == null ) {
            return null;
        } else {
            $resultat = $this->model->connexion($user, $mdp);
            $_SESSION['nom'] = $resultat['nom'];
            $_SESSION['prenom'] = $resultat['prenom'];
            $_SESSION['tel'] = $resultat['tel'];
            $_SESSION['id_user'] = $resultat['id_user'];
            $_SESSION['mdp'] = $resultat['mdp'];
            $_SESSION['email'] = $resultat['mail'];
            if (!empty($this->selectAdmin($resultat['id_user']))) {
                $admin = $this->selectAdmin($resultat['id_user']);
                $isAdmin = true;
                $_SESSION['admin_lvl'] = $admin['admin_lvl'];
            }

            if (!$isAdmin) {
                header("Location:home");
                exit();
            } elseif ($isAdmin) {
                header("Location:admin");
                exit();
            }
        }
    }

    public function deconnexion() {
        session_destroy();
        header("Location:connexion?succes=dc");
        exit();
    }

    public function addEssai($data) {
        $veh = $this->selectVehicule($data['immat']);
        $data['id_vehicule'] = $veh['data']['id_vehicule'];
        $this->model->addEssai($data);
        header("Location:connexion?succes=dc");
    }

    public function inscription($tab) {
        $this->model->inscription($tab);
        header("Location:connexion?succes=ir");
    }

    public function selectAllClients(){
        $resultat = $this->model->selectAllClients();
        return $resultat;
    }

    public function selectClient($id) {
        return $this->model->selectClient($id);
    }

    public function selectAllVehiculesNeuf() {
        return $this->model->selectAllVehiculesNeuf();
    }
    
    public function selecttreeVehiculesNeuf() {
        return $this->model->selecttreeVehiculesNeuf();

    }

    public function selectAllVehiculesOccasion() {
        return $this->model->selectAllVehiculesOccasion();
    }

    public function selecttreeVehiculesOccasion() {
        return $this->model->selecttreeVehiculesOccasion();
        
    }
    public function selectAllVehiculesClient() {
        return $this->model->selectAllVehiculesClient();
    }

    public function selectVehiculeClient($iduser) {
        return $this->model->selectVehiculeClient($iduser);
    }

    public function selectVehicule($immatriculation) {
        return $this->model->selectVehicule($immatriculation);
    }

    //Devis

    public function selectDevis($id) {
        return $this->model->selectDevis($id);
    }

    public function insertDevis($data) {
        $this->model->insertDevis($data);
    }
}