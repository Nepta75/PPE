<?php
include 'includes/header.php';
require 'controleur/controleur.php';
$controleur = new Controleur ('localhost', 'bmwv2', 'root','');
$vehiculesNeufs = $controleur->selectAllVehiculesNeuf();
$vehiculesOccasions = $controleur->selectAllVehiculesOccasion();
?>

<div class="vehicule_page" id=vehiculeneuf>
    <?php 
    require ('vue/vue_vehicule_neuf.php'); 
    require ('vue/vue_vehicule_occasion.php');
    ?>
</div>

<?php
include 'includes/footer.php';
?>

