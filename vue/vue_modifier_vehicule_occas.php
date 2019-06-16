<div class="form-panel_admin">
    <form action="" method="POST">
        <div>
            <label for="immatriculation"> Immatriculation : </label>
            <input type="text" readonly value="<?= $resultat['immatriculation'] ?>" id="immatriculation" name="immatriculation" />
        </div>
        <div>
            <label> Type : </label>
            <select name="type">
                <option value="<?= $resultat['type_vehicule'] ?>">--- <?= $resultat['type_vehicule'] ?> ---</option>
                <option value="2 Roues">2 Roues</option>
                <option value="4 Roues">4 Roues</option>
            </select>
        </div>
        <div>
            <label for="modele"> Modèle : </label>
            <input type="text" id="modele" value="<?= $resultat['modele'] ?>" name="modele" />
        </div>
        <div>
            <label for="millesime"> Millesime : </label>
            <input type="text" id="millesime" name="millesime" value="<?= $resultat['millesime'] ?>" />
        </div>
        <div>
            <label for="cylindree"> Cylindrée : </label>
            <input type="text" id="cylindree" name="cylindree" value="<?= $resultat['cylindree'] ?>" />
        </div>
        <div>
            <label> Énergie : </label>
            <select name="energie">
                <option value="<?= $resultat['energie'] ?>">--- <?= $resultat['energie'] ?> ---</option>
                <option value="Essence">Essence</option>
                <option value="Electrique">Electrique</option>
                <option value="Diesel">Diesel</option>
                <option value="Hybride">Hybride</option>
            </select>
        </div>
        <div>
            <label> Type de boîte : </label>
            <select name="typeBoite">
                <option value="<?= $resultat['type_boite'] ?>">--- <?= $resultat['type_boite'] ?> ---</option>
                <option value="Manuelle">Manuelle</option>
                <option value="Automatique">Automatique</option>
            </select>
        </div>
        <div>
            <label for="km"> Kilométrage : </label>
            <input type="text" id="km" name="km" value="<?= $resultat['kilometrage'] ?>"/>
        </div>
        <div>
            <label for="prix"> Prix : </label>
            <input type="text" id="prix" name="prix" value="<?= $resultat['prix'] ?>"/>
        </div>
        <div>
            <label for="dateImma"> Date 1ère immatriculation : </label>
            <input type="date" id="dateImma" name="dateImma" value="<?= $resultat['date_immat'] ?>" />
        </div>
        <div>
            <label for="descriptif"> Descriptif : </label>
            <textarea name="descriptif" id="descriptif"><?= $resultat['descriptif'] ?></textarea>
        </div>
        <div>
            <label> Véhicule Valide : </label>
            <select name="valide_vehicule">
                <option value="<?= $resultat['valide'] ?>"><?= $resultat['valide'] ?></option>
                <option value="Oui">Oui</option>
                <option value="Non">Non</option>
            </select>
        </div>
        <div>
            <label for="img_vehicule">URL de l'image : </label>
            <input type="text" id="img_vehicule" name="img_vehicule" value="<?= $resultat['img'] ?>" />
        </div>
        <div class="btn">
            <div class="btn-update">
                <input type="submit" value="Mettre à jour" name="update_vehicule_occasion" />
            </div>
            <div class="btn-delete">
                <input type="submit" value="Supprimer" name="supp_vehicule_occasion" />
            </div>
            <div class="btn-annul">
                <input type="submit" value="Annuler" name="annuler" />
            </div>
        </div>
    </form>
</div>