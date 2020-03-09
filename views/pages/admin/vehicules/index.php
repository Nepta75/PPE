<?php
if ($admin == null) {
    $error = "Erreur - 404. Page introuvable";
} else {
    //Ajout vehicule
    if(isset($_POST['add_vehicule_neuf'])) {
        $this->cAdmin->addVehiculeNeuf($_POST);
    }
    if(isset($_POST['add_vehicule_occasion'])) {
        $this->cAdmin->addVehiculeOccas($_POST);
    }
    if(isset($_POST['add_vehicule_client'])) {
        $this->cAdmin->addVehiculeClient($_POST);
    }

    //Suppression Vehicule
    if (isset($_POST['supp_vehicule_neuf'])) {
        $this->cAdmin->deleteVehiculeNeuf($_POST['immatriculation']);
        $succes = "Succes : Vous venez de supprimer le vehicule neuf d'immatriculation : ".$_POST['immatriculation']." ! ";
    }

    if (isset($_GET['type']) && !empty($_GET['type'])) {
        $array = ['add', 'update', 'delete'];
        $value = array_search($_GET['type'], $array);

        switch($value) {
            case 0: require VIEW.'pages/admin/vehicules/vehicule_add.php'; break;
            case 1: require VIEW.'pages/admin/vehicules/vehicule_update.php'; break;
            case 2: require VIEW.'pages/admin/vehicules/vehicule_delete.php'; break;
        }
    }
}
?>
