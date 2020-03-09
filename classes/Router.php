<?php
class Router {
    private $request;
    private $route = [
        "/"         => ["controller"=>"ControllerRender", "method"=>'renderHome'],
        "home"      => ["controller"=>"ControllerRender", "method"=>'renderHome'],
        "admin"     => ["controller"=>"ControllerRender", "method"=>'renderAdmin'],
        "vehicule" => ["controller"=>"ControllerRender", "method"=>'renderVehicule'],
        "propos" => ["controller"=>"ControllerRender", "method"=>'renderPropos'],
        "contact" => ["controller"=>"ControllerRender", "method"=>'renderContact'],
        "essayer" => ["controller"=>"ControllerRender", "method"=>'renderEssayer'],
        "fiche-vehicule" => ["controller"=>"ControllerRender", "method"=>'renderFicheVehicule'],
        "devis" => ["controller"=>"ControllerRender", "method"=>'renderDevis'],
        

        "connexion" => ["controller"=>"ControllerRender", "method"=>'renderConnexion'],
        "inscription" => ["controller"=>"ControllerRender", "method"=>'renderInscription'],
        "deconnexion" => ["controller"=>"Controller", "method"=>'deconnexion'],

    ];

    public function __construct($request) {
        $this->request = $request;
    }

    public function renderController($data) {
        $route = $this->route;
        $request = $this->request;

        if (key_exists($request, $route)) {
            include_once CONTROLLER.$route[$request]['controller'].'.php';
            $controller = $route[$request]['controller'];
            $method = $route[$request]['method'];
            $currentController = new $controller();
            $currentController->$method($data);
        } else {
            echo '404';
        }
    }
}