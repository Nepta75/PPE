<form action="" method="POST">
        <div class="ajout_vehicule_type">
        <?php if (isset($erreur)) {echo "<div class='error-message center'>".$erreur."</div>";} ?>
            <label>Modifier un véhicule de type : </label>
            <select name="type_modif">
                <option value=""><?php if(isset($_POST['type_modif'])) { echo "----- Modification d'un vehicule ".$_POST['type_modif']." -----"; } ?></option>
                <option value="neuf">Neuf</option>
                <option value="occasion">Occasion</option>
                <option value="client">Client</option>
            </select>
        </div>
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