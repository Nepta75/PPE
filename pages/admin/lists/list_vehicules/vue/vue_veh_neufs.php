<table>
    <thead>
        <tr class="table100-head">
            <th class="column5">marque</th>
            <th class="column6">modele</th>
            <th class="column8">immatriculation</th>
            <th class="column8">Type Vehicule</th>
            <th class="column8">Cylindree</th>
            <th class="column8">Ernergie</th>
            <th class="column8">Boite</th>
            <th class="column8">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $data) { ?>
            <tr onclick="document.location = 'admin.php?page=6&action=m&iduser=<?= $data['id_vehicule'] ?>'";>
                <td class="column5"><?= $data['marque'] ?></td>
                <td class="column6"><?= $data['modele'] ?></td>
                <td class="column8"><?= $data['immatriculation'] ?></td>
                <td class="column8"><?= $data['type_vehicule'] ?></td>
                <td class="column8"><?= $data['cylindree'] ?></td>
                <td class="column8"><?= $data['energie'] ?></td>
                <td class="column8"><?= $data['type_boite'] ?></td>
                <td class="column8"><a href="admin.php?page=4&select=neuf&delete=<?= $data['id_vehicule'] ?>"><i style="color: red;" class="fas fa-user-times"></i></a></td>
            </tr>
    <?php } ?>
    </tbody>
</table>