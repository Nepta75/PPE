
<table>
    <thead>
        <tr class="table100-head">
            <th class="column1">Nom</th>
            <th class="column2">Prenom</th>
            <th class="column3">Pseudo</th>
            <th class="column4">Adresse</th>
            <th class="column5">tel</th>
            <th class="column6">email</th>
            <th class="column7">mdp</th>
            <th class="column8">admin LVL</th>
            <th class="column8">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $data) { ?>
            <tr onclick="document.location = 'admin.php?page=6&action=m&iduser=<?= $data['idclient'] ?>'";>
                <td class="column1"><?= $data['nom'] ?></td>
                <td class="column2"><?= $data['prenom'] ?></td>
                <td class="column3"><?= $data['pseudo'] ?></td>
                <td class="column4"><?= $data['adresse_rue'].", ".$data['adresse_cp'].", ".$data['adresse_ville'] ?></td>
                <td class="column5"><?= $data['tel'] ?></td>
                <td class="column6"><?= $data['email'] ?></td>
                <td class="column7"><?= $data['mdp'] ?></td>
                <td class="column8"><?= $data['admin_lvl'] ?></td>
                <td class="column8"><a href="admin.php?page=6&action=x&iduser=<?= $data['idclient'] ?>"><i style="color: red;" class="fas fa-user-times"></i></a></td>
            </tr>
    <?php } ?>
    </tbody>
</table>