<h2 class="list__title"> Liste des véhicules neufs </h2>
<table>
    <thead>
        <tr class="table100-head">
            <th class="column1">Marque</th>
            <th class="column2">Modele</th>
            <th class="column3">Immatriculation</th>
            <th class="column4">Type de véhicule</th>
            <th class="column5">Cylindrée</th>
            <th class="column6">Énergie</th>
            <th class="column7">Boite</th>
            <th class="column8">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $data) { ?>
            <tr onclick="document.location = 'fiche-vehicule?immat=<?=$data['immatriculation'] ?>'";;>
                <td class="column1"><?= $data['marque'] ?></td>
                <td class="column2"><?= $data['modele'] ?></td>
                <td class="column3"><?= $data['immatriculation'] ?></td>
                <td class="column4"><?= $data['type_vehicule'] ?></td>
                <td class="column5"><?= $data['cylindree'] ?></td>
                <td class="column6"><?= $data['energie'] ?></td>
                <td class="column7"><?= $data['type_boite'] ?></td>
                <td class="column8"><a href="admin?page=5&select=neuf&delete=<?= $data['id_vehicule'] ?>"><i style="color: red;" class="fas fa-trash-alt"></i></a></td>
            </tr>
    <?php } ?>
    </tbody>
</table>