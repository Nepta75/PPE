<div class="form-panel_admin">
    <form action="" method="POST">
        <div>
            <label for="immatriculation">* Immatriculation : </label>
            <input name="immatriculation" readonly type="text" id="immatriculation" value="<?= $resultat['immatriculation'] ?>"/>
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
            <input type="text" id="marque" name="marque" value="<?= $resultat['marque'] ?>"/>
        </div>
        <div>
            <label for="modele">* Modèle : </label>
            <input type="text" id="modele" name="modele" value="<?= $resultat['modele'] ?>"/>
        </div>
        <div>
            <label for="cylindree">* Cylindrée : </label>
            <input type="text" id="cylindree" name="cylindree" value="<?= $resultat['cylindree'] ?>" />
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
            <label for="prix">* Prix : </label>
            <input type="text" id="prix" name="prix" value="<?= $resultat['prix'] ?>"/>
        </div>
        <div>
            <label for="img1">* img 1: </label>
            <input type="text" id="img1" name="img1" value="<?= $resultat['img_1'] ?>" />
        </div>
        <div>
            <label for="img1">img 2: </label>
            <input type="text" id="img2" name="img2" value="<?= $resultat['img_2'] ?>" />
        </div>
        <div class="btn">
            <div class="btn-update">
                <input type="submit" name="update_vehicule_neuf" value="Mettre à jour" />
            </div>
            <div class="btn-delete">
                <input type="submit" name="supp_vehicule_neuf" value="Supprimer" />
            </div>
            <div class="btn-annul">
                <input type="submit" value="Annuler" name="annuler" />
            </div>
        </div>
    </form>
</div>