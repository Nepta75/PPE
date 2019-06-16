<form action="" method="POST">
        <div class="ajout_vehicule_type">
        <div class="modif_vehicule_immat">
            <label>
                Immatriculaton du véhicule :
            </label>
            <input type="text" name="immatriculation" 
            value="<?php if (isset($_POST['immatriculation'])) {echo $_POST['immatriculation']; }?>" 
            />
            <input type="submit" name="immat"/>
        </div>
</form>