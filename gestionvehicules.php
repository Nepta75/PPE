<?php
include 'includes/header.php';
require 'controleur/controleur.php';
$controleur = new Controleur ("localhost", "bmwppe", "root", "");
$vehiculesNeuf = $controleur->selectAllVehiculesNeuf();
$vehiculesOccasion = $controleur->selectAllVehiculesOccasionDispo();
$vehiculesIndispo = $controleur->selectAllVehiculesOccasionIndispo();
?>

<?php
if (isset($_GET['dispo']) && $_GET['dispo'] == "non") {
    require ("vue/vue_vehicule_indispo.php");
    return;
}
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

