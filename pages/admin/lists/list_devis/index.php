<?php
include_once "controleur/controleur_admin.php";
$controleur = new Administrateur('localhost', 'bmwv2', 'root', '');
$data = $controleur->selectAlldevis();
require 'vue/vue_list_devis.php';
?>