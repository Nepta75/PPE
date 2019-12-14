<?php
include '../../includes/header.php';
$controleur = new Controleur ('localhost', 'bmwv2', 'root','');
$vehiculesNeufs = $controleur->selectAllVehiculesNeuf();
$vehiculesOccasions = $controleur->selectAllVehiculesOccasion();

if (isset($_GET['type']) && !empty($_GET['type'])) {
    $array = ['neuf', 'occas'];
    $value = array_search($_GET['type'], $array);
}
?>

<div class="vehicule_page" id=vehiculeneuf>
    <?php 
    if (isset($value)) {
        switch ($value) {
            case 0: require ('vue/vue_vehicule_neuf.php'); break;
            case 1: require ('vue/vue_vehicule_occasion.php'); break;
        }
    } else {
        require ('vue/vue_vehicule_neuf.php'); 
        require ('vue/vue_vehicule_occasion.php');
    }
    ?>
</div>
<?php
include '../../includes/footer.php';
?>

