<h2 class="list__title"> Liste des véhicules d'occasions </h2>
<table>
    <thead>
        <tr class="table100-head">
            <th class="column1">Marque</th>
            <th class="column2">Modèle</th>
            <th class="column3">Immatriculation</th>
            <th class="column4">Type de véhicule</th>
            <th class="column5">Cylindrée</th>
            <th class="column6">Énergie</th>
            <th class="column7">Boite</th>
            <th class="column8">État</th>
            <th class="column9">Kilométrage</th>
            <th class="column10">Prix</th>
            <th class="column11">Action</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $data) { ?>
        <tr onclick="document.location = 'admin.php?page=6&action=m&iduser=<?= $data['id_vehicule'] ?>'";>
            <td class="column1"><?= $data['marque'] ?></td>
            <td class="column2"><?= $data['modele'] ?></td>
            <td class="column3"><?= $data['immatriculation'] ?></td>
            <td class="column4"><?= $data['type_vehicule'] ?></td>
            <td class="column5"><?= $data['cylindree'] ?></td>
            <td class="column6"><?= $data['energie'] ?></td>  
            <td class="column7"><?= $data['type_boite'] ?></td>
            <td class="column8"><?= $data['etat'] ?></td>
            <td class="column9"><?= $data['km'] ?></td>
            <td class="column10"><?= $data['prix'] ?></td>
            <td class="column11"><a href="/ppe/pages/admin/index.php?page=5&select=occas&delete=<?= $data['id_vehicule'] ?>"><i style="color: red;" class="fas fa-trash-alt"></i></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>