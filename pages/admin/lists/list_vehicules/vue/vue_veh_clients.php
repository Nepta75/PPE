<table>
    <thead>
        <tr class="table100-head">
            <th class="column1">Nom</th>
            <th class="column2">Prénom</th>
            <th class="column3">mail</th>
            <th class="column4">adresse</th>
            <th class="column5">tel</th>
            <th class="column7">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $data) { ?>
            <tr onclick="document.location = '/?delete=<?= $data['id_user'] ?>'";>
                <td class="column1"><?= $data['nom'] ?></td>
                <td class="column2"><?= $data['prenom'] ?></td>
                <td class="column3"><?= $data['mail'] ?></td>
                <td class="column4"><?= $data['adresse'] ?></td>
                <td class="column5"><?= $data['tel'] ?></td>
                <td class="column7"><a href="admin.php?page=6&action=x&iduser=<?= $data['id_user'] ?>"><i style="color: red;" class="fas fa-user-times"></i></a></td>
            </tr>
    <?php } ?>
    </tbody>
</table>