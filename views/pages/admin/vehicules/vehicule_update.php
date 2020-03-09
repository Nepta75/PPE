<?php
if (isset($_POST['immat'])) {
    if (isset($_POST['immatriculation']) && !empty($_POST['immatriculation'])) {
        if ($this->cAdmin->verifImmat($_POST['immatriculation']) !== false) {
            $result = $this->cAdmin->selectVehicule($_POST['immatriculation']);
            if($result != null) {
                echo "<h3 style='margin-top: 100px; text-align:center'>Modification d'un vehicule ".$result['type']."</h3>";
                $array = ['neuf', 'occas', 'client'];
                $value = array_search($result['type'], $array);
            } else {
                $erreur = "Erreur : Véhicule introuvable !";
            }
        }
    } else {
        $erreur = "Erreur : L'immatriculation est manquante";
    }
    
}

if (isset($_POST['delete_veh'])) {
    $id = $this->cAdmin->selectIdVehicule(htmlspecialchars($_POST['immatriculation']));
    $this->cAdmin->deleteVehicule($id);
    $succes = "Succes: Vehicule supprimé avec succès";
}

if (isset($erreur)) echo $erreur;
if (isset($succes)) echo $succes;
?>
<form action="" method="POST">
    <div class="modif_vehicule_immat">
        <label>
            Immatriculaton du véhicule :
        </label>
        <input type="text" name="immatriculation"
            value="<?php if (isset($_POST['immatriculation'])) {echo $_POST['immatriculation']; }?>" />
        <input type="submit" name="immat" />
    </div>
</form>
<?php
if (isset($_POST['update_vehicule_neuf'])) {
    $this->cAdmin->updateVehiculeNeuf($_POST);
}
if (isset($_POST['update_vehicule_occasion'])) {
    $this->cAdmin->updateVehiculeOccas($_POST);
}
if(isset($_POST['update_vehicule_client'])) {
    $this->cAdmin->updateVehiculeClient($_POST);
}

if (isset($value)) {
    $resultat = $result['data'];
    switch ($value) {
        case 0:  
            require VIEW."pages/admin/vehicules/vue/vue_update/veh_neuf_update.php"; break;
        case 1:  
            require VIEW."pages/admin/vehicules/vue/vue_update/veh_occas_update.php"; break;
        case 2: 
            require VIEW."pages/admin/vehicules/vue/vue_update/veh_client_update.php"; break;
    }
}
?>