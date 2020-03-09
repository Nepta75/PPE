<?php
$vehiculesNeufs = $this->selectAllVehiculesNeuf();
$vehiculesOccasions = $this->selectAllVehiculesOccasion();

if (isset($_GET['type']) && !empty($_GET['type'])) {
    $array = ['neuf', 'occas'];
    $value = array_search($_GET['type'], $array);
}
?>

<div class="vehicule_page" id=vehiculeneuf>
    <?php 
    if (isset($value)) {
        switch ($value) {
            case 0: require VIEW.'pages/vehicule/vue/vue_vehicule_neuf.php'; break;
            case 1: require VIEW.'pages/vehicule/vue/vue_vehicule_occasion.php'; break;
        }
    } else {
        require VIEW.'pages/vehicule/vue/vue_vehicule_neuf.php'; 
        require VIEW.'pages/vehicule/vue/vue_vehicule_occasion.php';
    }
    ?>
</div>

