<div class="vehicule_header">
    <?php if (!empty($vehiculesNeufs)) { 
        if (count($vehiculesNeufs) == 1) {    
            echo "<h3> Vehicule neuf disponible </h3>";
        } else { 
            echo "<h3> Vehicules neufs disponibles</h3>";
        } 
        foreach($vehiculesNeufs as $data) { ?>
            <div class="vehicule-block">
                <img src="<?= $data['img_1'] ?>" alt='img_vehicule' />
                <div><label>Marque :</label><span><?= $data['marque'] ?></span></div>
                <div><label>Type :</label><span><?= $data['type_vehicule'] ?></span></div>
                <div class="vehicule_prix"><label class="prix_label">Prix :</label><span class="prix_span"><?= $data['prix'] ?>€</span></div>
                <?php if (isset($_SESSION['admin_lvl']) && $_SESSION['admin_lvl'] > 0) { ?>
                    <div class="modifier"><a href="admin.php?page=2&immat=<?= $data['immatriculation']?>&type=neuf">Modifier</a></div>
                <?php } else { ?>
                    <div class="reserver"><a href="gestionresa.php?demande=essai&modele=<?= $data['modele'] ?>&immat=<?= $data['immatriculation']?>">Essayer</a></div>
                <?php } ?>
            </div>
    <?php } }?>
</div>