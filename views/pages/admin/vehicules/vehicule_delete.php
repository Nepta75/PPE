<?php
if (isset($_POST['delete'])) {
    if (isset($_POST['immatriculation']) && !empty($_POST['immatriculation'])) {
        $immat = htmlspecialchars($_POST['immatriculation']);
        if ($this->cAdmin->verfiImmat($immat)) {
            $id = $this->cAdmin->selectIdVehicule($immat);
            $this->cAdmin->deleteVehicule($id);
            $succes = "Succes: Véhicule supprimé avec succès !";
        }
    }
} else if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $id = htmlspecialchars($_GET['delete']);
    $this->cAdmin->deleteVehicule($id);
    $succes = "Succes: Véhicule supprimé avec succès !";
}
?>

<?php 
    if (isset($erreur)) echo $erreur;
    if (isset($succes)) echo $succes;
?>
<form action="" method="POST">
    <div class="modif_vehicule_immat">
        <label>
            Immatriculaton du véhicule :
        </label>
        <input type="text" name="immatriculation" 
            value="<?php if (isset($_POST['immatriculation'])) {echo $_POST['immatriculation']; }?>" 
        />
        <input type="submit" name="delete"/>
    </div>
</form>