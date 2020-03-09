<div class="form-panel_admin">
    <form action="" method="POST">
        <div class="users_select">
            <label>* Attribué à : </label>
            <select name="user">
                <option value="<?=$resultat['id_user'] ?>">--- <?=$resultat['nom'].' '.$resultat['prenom'] ?> ---</option>
                <?php
                foreach($clients as $client){
                    ?><option value="<?= $client['id_user']?>"><?= $client['nom'].' '.$client['prenom'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="immatriculation">* Immatriculation : </label>
            <input type="text" readonly value="<?= $resultat['immatriculation'] ?>" id="immatriculation" name="immatriculation" />
        </div>
        <div>
            <label>* Type : </label>
            <select name="type">
                <option value="<?= $resultat['type_vehicule'] ?>">--- <?= $resultat['type_vehicule'] ?> ---</option>
                <option value="2 Roues">2 Roues</option>
                <option value="4 Roues">4 Roues</option>
            </select>
        </div>
        <div>
            <label for="marque">* Marque : </label>
            <input type="text" value="<?= $resultat['marque'] ?>" id="marque" name="marque" />
        </div>
        <div>
            <label for="modele">* Modèle : </label>
            <input type="text" value="<?= $resultat['modele'] ?>" id="modele" name="modele" />
        </div>
        <div>
            <label for="cylindree">* Cylindrée : </label>
            <input type="text" value="<?= $resultat['cylindree'] ?>" id="cylindree" name="cylindree" />
        </div>
        <div>
            <label>* Énergie : </label>
            <select name="energie">
                <option value="<?= $resultat['energie'] ?>">--- <?= $resultat['energie'] ?> ---</option>
                <option value="Essence">Essence</option>
                <option value="Electrique">Electrique</option>
                <option value="Diesel">Diesel</option>
                <option value="Hybride">Hybride</option>
            </select>
        </div>
        <div>
            <label>* Type de boîte : </label>
            <select name="typeBoite">
                <option value="<?= $resultat['type_boite'] ?>">--- <?= $resultat['type_boite'] ?> ---</option>
                <option value="Manuelle">Manuelle</option>
                <option value="Automatique">Automatique</option>
            </select>
        </div>
        <div>
            <label for="km">* km : </label>
            <input type="text" value="<?= $resultat['km'] ?>" id="km" name="km" />
        </div>
        <div>
            <label for="dateImma"> Date 1ère immatriculation : </label>
            <input type="date" value="<?= $resultat['date_immat'] ?>" id="dateImma" name="dateImma" />
        </div>
        <div>
            <label for="etat">* Etat : </label>
            <textarea name="etat" id="etat"><?= $resultat['etat'] ?></textarea>
        </div>
        <div>
            <label for="info"> Info supplémentaire : </label>
            <textarea name="info" id="info"><?= $resultat['information'] ?></textarea>
        </div>
        <div>
            <label for="img1">* img 1 : </label>
            <input type="text" id="img1" name="img1" value=<?= $resultat['img_1'] ?> />
        </div>
        <div>
            <label for="img2"> img 2 : </label>
            <input type="text" id="img2" name="img2" value="<?= $resultat['img_2'] ?>" />
        </div>
        <div class="btn">
            <div class="btn-update">
                <input type="submit" value="Mettre à jour" name="update_vehicule_client" />
            </div>
            <div class="btn-delete">
                <input type="submit" value="Supprimer" name="delete_veh" />
            </div>
            <div class="btn-annul">
                <input type="submit" value="Annuler" name="annuler" />
            </div>
        </div>
    </form>
</div>