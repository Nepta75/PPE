<div class="vehicule_header" id=vehiculeoccasion>
    <?php if (!empty($vehiculesOccasions)) 
    {
        if (count($vehiculesOccasions) == 1)
        {    
            echo "<h3> Vehicule d'occasion disponible </h3>";
        } else { 
            echo "<h3> Vehicules d'occasion disponibles</h3>";
        } 
        foreach($vehiculesOccasions as $data) { ?>
        <div class="vehicule-block">
            <img src="<?= $data['img_1'] ?>" alt='img_vehicule' />
            <?php if(isset($_SESSION['admin_lvl']) && $_SESSION['admin_lvl'] > 0 ) { ?>
            <?php } ?>
            <div><label>Marque :</label><span><?= $data['modele'] ?></span></div>
            <div><label>Type :</label><span><?= $data['type_vehicule'] ?></span></div>
            <div><label>Kilométrage :</label><span><b><?= $data['km'] ?> km</b></span></div>
            <div><label>État :</label><span><?= $data['etat'] ?></span></div>
            <div class="vehicule_prix"><label class="prix_label">Prix :</label><span class="prix_span"><?= $data['prix'] ?>€</span></div>
            <?php if (isset($_SESSION['admin_lvl']) && $_SESSION['admin_lvl'] > 0) { ?>
                <div class="modifier"><a href="admin.php?page=2&immat=<?= $data['immatriculation']?>&type=occasion">Modifier</a></div>
            <?php } else { ?>
                <div class="reserver"><a href="gestionresa.php?demande=essai&modele=<?= $data['modele'] ?>&immat=<?= $data['immatriculation']?>">Essayer</a></div>
            <?php } ?>
        </div>
        <?php } 
    } ?>
    </div>