<table>
    <thead>
        <tr class="table100-head">
            <th class="column1">Nom</th>
            <th class="column2">Prénom</th>
            <th class="column3">Adresse</th>
            <th class="column4">Info</th>
            <th class="column5">Prix</th>
            <th class="column6">Date devis</th>
            <th class="column7">Date creation</th>
            <th class="column9">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $data) { ?>
            <tr onclick="document.location = 'admin.php?page=6&action=m&iduser=<?= $data['id_user'] ?>'";>
                <td class="column1"><?= $data['nom'] ?></td>
                <td class="column2"><?= $data['prenom'] ?></td>
                <td class="column3"><?= $data['adresse'] ?></td>
                <td class="column4"><?= $data['info'] ?></td>
                <td class="column5"><?= $data['prix'] ?></td>
                <td class="column6"><?= $data['date_devis'] ?></td>  
                <td class="column7"><?= $data['date_creation'] ?></td>
                <td class="column9"><a href="admin.php?page=6&action=x&iduser=<?= $data['id_user'] ?>"><i style="color: red;" class="fas fa-user-times"></i></a></td>
            </tr>
    <?php } ?>
    </tbody>
</table>