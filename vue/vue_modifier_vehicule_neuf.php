<div class="form-panel_admin">
    <form action="" method="POST">
        <div>
            <label for="immatriculation"> Immatriculation : </label>
            <input name="immatriculation" readonly type="text" id="immatriculation" value="<?= $resultat['immatriculation'] ?>"/>
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
            <input type="text" id="modele" name="modele" value="<?= $resultat['modele'] ?>"/>
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
            <label for="prix"> Prix : </label>
            <input type="text" id="prix" name="prix" value="<?= $resultat['prix'] ?>"/>
        </div>
        <div>
            <label for="dateImma"> Date 1ère immatriculation : </label>
            <input type="date" id="dateImma" name="dateImma" value="<?= $resultat['date_immat'] ?>"/>
        </div>
        <div>
            <label for="img_vehicule"> URL de l'image : </label>
            <input type="text" id="img_vehicule" name="img_vehicule" value="<?= $resultat['img'] ?>" />
        </div>
        <div>
            <input type="submit" name="update_vehicule_neuf" value="Mettre à jour" />
        </div>
        <div>
            <input type="submit" name="supp_vehicule_neuf" value="Supprimer" />
        </div>
    </form>
</div>