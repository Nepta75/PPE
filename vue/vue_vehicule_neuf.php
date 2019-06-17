<div class="vehicule_header">
        <h3> Vehicule(s) Neuf disponible(s)</h3>
        <?php while($data = $vehiculesNeuf->fetch()) { ?>
        <div class="vehicule-block">
            <img src="<?= $data['img'] ?>" alt='img_vehicule' />
            <?php if(isset($_SESSION['admin_lvl']) && $_SESSION['admin_lvl'] > 0 ) { ?>
            <div><label>Immatriculation :</label><span><?= $data['immatriculation'] ?></span></div> <?php } ?>
            <div><label>Marque :</label><span><?= $data['modele'] ?></span></div>
            <div><label>Cylindrée :</label><span><?= $data['cylindree'] ?></span></div>
            <div><label>Type :</label><span><?= $data['type_vehicule'] ?></span></div>
            <div><label>Année :</label><span><?= $data['millesime'] ?></span></div>
            <div class="vehicule_prix"><label class="prix_label">Prix :</label><span class="prix_span"><?= $data['prix'] ?>€</span></div>
            <?php if (isset($_SESSION['admin_lvl']) && $_SESSION['admin_lvl'] > 0) { ?>
                <div class="modifier"><a href="admin.php?page=2&immat=<?= $data['immatriculation']?>&type=neuf">Modifier</a></div>
            <?php } else { ?>
                <div class="reserver"><a href="gestionresa.php?immat=<?= $data['immatriculation']?>">Reserver</a></div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>