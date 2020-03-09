<div class='somme_devis'>Somme total des devis confirmé : <b><?= $somme ?></b> </div>
<table>
    <thead>
        <tr class="table100-head">
            <th class="column1">Sujet</th>
            <th class="column1">Immatriculation</th>
            <th class="column1">Nom</th>
            <th class="column2">Prénom</th>
            <th class="column3">Adresse</th>
            <th class="column4">Info</th>
            <th class="column5">Prix</th>
            <th class="column6">Date devis</th>
            <th class="column1">Nom referent</th>
            <th class="column1">Prenom referent</th>
            <th class="column1">Statut</th>
            <th class="column9">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $data) { ?>
            <tr>
                <td class="column1"><?= $data['sujet'] ?></td>
                <td class="column1"><?= $data['immatriculation'] ?></td>
                <td class="column1"><?= $data['nom'] ?></td>
                <td class="column2"><?= $data['prenom'] ?></td>
                <td class="column3"><?= $data['adresse'] ?></td>
                <td class="column4"><?= $data['info'] ?></td>
                <td class="column5"><?= $data['prix'] ?></td>
                <td class="column6"><?= $data['date_devis'] ?></td>  
                <td class="column7"><?= $data['nom_referent'] ?></td>
                <td class="column7"><?= $data['prenom_referent'] ?></td>
                <td class="column7"><?= $data['Statut'] ?></td>
                <td class="column9">
                    <div style="display: flex">
                        <a class="ml-3" href="admin?page=4&statut=confirme&id=<?= $data['id_devis']?>"><i style="color: green;" class="fas fa-check"></i></a>
                        <a class="ml-3" href="admin?page=4&statut=refuser&id=<?= $data['id_devis']?>"><i style="color: red;" class="fas fa-ban"></i></a>
                        <a class="ml-3" href="admin?page=4&delete=<?= $data['id_devis'] ?>"><i style="color: red;" class="fas fa-trash-alt"></i></a>
                    </div>
                </td>
            </tr>
    <?php } ?>
    </tbody>
</table>