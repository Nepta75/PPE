<?php
include_once CONTROLLER.'Controller.php';

class ControllerRender extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function renderHome() {
        $this->renderHeader();
        $vehiculesNeufs = $this->selecttreeVehiculesNeuf();
        include_once VIEW.'pages/home/index.php';
        $this->renderFooter();
    }

    public function renderConnexion() {
        $this->renderHeader();
        $vehiculesNeufs = $this->selecttreeVehiculesNeuf();
        include_once VIEW.'pages/connexion/index.php';
        include_once VIEW.'pages/connexion/vue/vueconnexion.php';
        $this->renderFooter();
    }

    public function renderAdmin() {
        require CONTROLLER.'ControllerMail.php';
        $cMail = new ControllerMail (DBHOST, DBNAME, DBUSER, DBMDP);
        $admin = $this->cAdmin->verifAdmin();
        $this->renderHeader();
        $vehiculesNeufs = $this->selecttreeVehiculesNeuf();
        include_once VIEW.'pages/admin/index.php';
        $this->renderFooter();
    }

    public function renderVehicule() {
        $this->renderHeader();
        include_once VIEW.'pages/vehicule/index.php';
        $this->renderFooter();
    }

    public function renderPropos() {
        $this->renderHeader();
        include_once VIEW.'pages/propos/index.php';
        $this->renderFooter();
    }

    public function renderContact() {
        $this->renderHeader();
        require CONTROLLER.'ControllerMail.php';
        $cMail = new ControllerMail (DBHOST, DBNAME, DBUSER, DBMDP);
        include_once VIEW.'pages/contact/index.php';
        $this->renderFooter();
    }

    public function renderEssayer() {
        $this->renderHeader();
        require CONTROLLER.'ControllerMail.php';
        $cMail = new ControllerMail (DBHOST, DBNAME, DBUSER, DBMDP);
        include_once VIEW.'pages/essayer/index.php';
        $this->renderFooter();
    }

    public function renderInscription() {
        $this->renderHeader();
        include_once VIEW.'pages/inscription/index.php';
        $this->renderFooter();
    }

    public function renderFicheVehicule() {
        $this->renderHeader();
        include_once VIEW.'pages/fiches/vehicule.php';
        $this->renderFooter();
    }

    public function renderDevis() {
        include_once FUNC.'traitement_devis.php';
    }
}