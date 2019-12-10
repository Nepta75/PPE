<?php
if ($admin == null) {
    $error = "Erreur - 404. Page introuvable";
} else {
    //Ajout vehicule
    if(isset($_POST['add_vehicule_neuf'])) {
        $cAdmin->addVehiculeNeuf($_POST);
    }
    if(isset($_POST['add_vehicule_occasion'])) {
        $cAdmin->addVehiculeOccas($_POST);
    }
    if(isset($_POST['add_vehicule_client'])) {
        $cAdmin->addVehiculeClient($_POST);
    }

    //Suppression Vehicule
    if (isset($_POST['supp_vehicule_neuf'])) {
        $cAdmin->deleteVehiculeNeuf($_POST['immatriculation']);
        $succes = "Succes : Vous venez de supprimer le vehicule neuf d'immatriculation : ".$_POST['immatriculation']." ! ";
    }

    if (isset($_GET['type']) && !empty($_GET['type'])) {
        $array = ['add', 'update', 'delete'];
        $value = array_search($_GET['type'], $array);

        switch($value) {
            case 0: require 'vehicule_add.php'; break;
            case 1: require 'vehicule_update.php'; break;
            case 2: require 'vehicule_delete.php'; break;
        }
    }
}
?>
