<div class="vehicule_header" id=vehiculeoccasion>
        <h3> Vehicule(s) d'Occasion disponible(s)</h3>
        <?php while($data = $vehiculesOccasion->fetch()) { ?>
        <div class="vehicule-block">
            <img src="<?= $data['img'] ?>" alt='img_vehicule' />
            <?php if(isset($_SESSION['admin_lvl']) && $_SESSION['admin_lvl'] > 0 ) { ?>
            <div><label>Immatriculation :</label><span><?= $data['immatriculation'] ?></span></div> <?php } ?>
            <div><label>Marque :</label><span><?= $data['modele'] ?></span></div>
            <div><label>Cylindrée :</label><span><?= $data['cylindree'] ?></span></div>
            <div><label>Type :</label><span><?= $data['type_vehicule'] ?></span></div>
            <div><label>Année :</label><span><?= $data['millesime'] ?></span></div>
            <div><label>Kilométrage :</label><span><b><?= $data['kilometrage'] ?> km</b></span></div>
            <div><label>Descriptif :</label><span><?= $data['descriptif'] ?></span></div>
            <div class="vehicule_prix"><label class="prix_label">Prix :</label><span class="prix_span"><?= $data['prix'] ?>€</span></div>
            <?php if (isset($_SESSION['admin_lvl']) && $_SESSION['admin_lvl'] > 0) { ?>
                <div class="modifier"><a href="admin.php?page=2&immat=<?= $data['immatriculation']?>&type=occasion">Modifier</a></div>
            <?php } else { ?>
                <div class="reserver"><a href="gestionresa.php?demande=essai&modele=<?= $data['modele'] ?>&immat=<?= $data['immatriculation']?>">Essayer</a></div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>