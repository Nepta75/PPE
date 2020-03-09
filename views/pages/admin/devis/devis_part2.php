<div class="gestiondevis">
    <h2>Etape 2 :</h2>
    <form action="" method="POST">
        <div class="gestiondevis-block">
            <div>
                <h4><label>Info Client : </label></h4>
            </div>
            <input type='hidden' name="sujet" value="<?= $data['sujet'] ?>" />
            <input type='hidden' name="id_user" value="<?= $data['user'] ?>" />
            <div>nom : <b><?= $user['nom'] ?></b></div>
            <div>prenom : <b><?= $user['prenom'] ?></b></div>
            <div>adresse : <b><?= $user['adresse'] ?></b></div>
            <div>tel : <b><?= "+33 ".$user['tel'] ?></b></div>
        </div>
        <?php if ($data['sujet'] == 'vente') { ?>
        <div class="gestiondevis-block">
            <div>
                <h4>sujet : <b style="color : #3DC97F"><?= $data['sujet'] ?></b></h4>
                <label>Vehicules disponibles (par immatriculation) : </label>
                <select name="vehicule">
                    <option value="">-- Selectionner un Vehicule --</option>
                    <?php if ($vehiculesNeufs != null ) { foreach($vehiculesNeufs as $vehiculeNeuf) { ?>
                    <option name="<?= $vehiculeNeuf['immatriculation'] ?>"><?= $vehiculeNeuf['immatriculation'] ?>
                    </option>
                    <?php }} ?>
                    <option value="">-- Vehicule d'occasion --</option>
                    <?php if ($vehiculesOccasions != null ) { foreach($vehiculesOccasions as $vehiculesOccasion) { ?>
                    <option name="<?= $vehiculesOccasion['immatriculation'] ?>">
                        <?= $vehiculesOccasion['immatriculation'] ?></option>
                    <?php }} ?>
                </select>
            </div>
            <?php } ?>
        </div>
        <div class="devis-btn">
            <input type="submit" name="valid2" value="Generer un devis" />
        </div>
    </form>
</div>