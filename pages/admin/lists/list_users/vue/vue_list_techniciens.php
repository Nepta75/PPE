<table>
    <thead>
        <tr class="table100-head">
            <th class="column1">Nom</th>
            <th class="column2">Prénom</th>
            <th class="column3">Adresse</th>
            <th class="column4">Téléphone</th>
            <th class="column5">Diplôme</th>
            <th class="column6">Mail</th>
            <th class="column7">Mdp</th>
            <th class="column8">LVL Technicien</th>
            <th class="column9">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $data) { ?>
        <tr onclick="document.location = 'pages/fichePerso/index.php?id=<?= $data['id_user'] ?>'";>
            <td class="column1"><?= $data['nom'] ?></td>
            <td class="column2"><?= $data['prenom'] ?></td>
            <td class="column3"><?= $data['adresse'] ?></td>
            <td class="column4"><?= $data['tel'] ?></td>
            <td class="column5"><?= $data['diplome'] ?></td>
            <td class="column6"><?= $data['mail'] ?></td>  
            <td class="column7"><?= $data['mdp'] ?></td>
            <td class="column8"><?= $data['technicien_lvl'] ?></td>
            <td class="column9"><a href="admin.php?page=5&select=technicien&delete=<?= $data['id_user'] ?>"><i style="color: red;" class="fas fa-user-times"></i></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>