<div class="fiche">
    <div class="fiche__title"><h3>Fiche du véhicule : <?= $data['immatriculation'] ?></h3></div>
    <div class="fiche__vehicule">
        <div class="fiche__image">
            <div><img src="/ppe/img/<?= $data['img_1'] ?>" alt="vehicule" /></div>
            <?php if (!empty($data['img_2'])) { ?>
            <div><img src="/ppe/img/<?= $data['img_2'] ?>" alt="vehicule" /></div>
            <?php } ?>
        </div>
        <div class='fiche__container fiche__container--vehicule'>
            <h4>L'essentiel</h4>
            <div class='fiche__element'>
                <div><label>Immatriculation :</label><?= $data['immatriculation'] ?></div>
                <div><label>Marque :</label><?= $data['marque'] ?></div>
                <div><label>Modele :</label><?= $data['modele'] ?></div>
                <div><label>Prix :</label><?= $data['prix'] ?></div>
            </div>
            <h4>Détails</h4>
            <div class='fiche__element'>
                <div><label>Type véhicule :</label><?= $data['type_vehicule'] ?></div>
                <div><label>Cylindrée :</label><?= $data['cylindree'] ?></div>
                <div><label>Energie :</label><?= $data['energie'] ?></div>
                <div><label>Type de boite :</label><?= $data['type_boite'] ?></div>
            </div>
        </div>
    </div>
    <div class="reserver m-3"><a href="gestionresa.php?demande=essai&modele=<?= $data['modele'] ?>&immat=<?= $data['immatriculation']?>">Essayer</a></div>
</div>