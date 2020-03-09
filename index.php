<?php
    if (isset($_GET['r']) && $_GET['r'] == 'devis') {
        ob_start();
    }
    include_once 'includes/_config.php';
    include_once CLASSE.'Router.php';
    
    if (isset($_GET['r'])) {
        $request = htmlspecialchars($_GET['r']);
    } else {
       $request = '/';
    }
    if (isset($_POST)) {
        $data = $_POST;
    } else {
        $data = [];
    }
    $router = new Router($request);
    $router->renderController($data);
?>