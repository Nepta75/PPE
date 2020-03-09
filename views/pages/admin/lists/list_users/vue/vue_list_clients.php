<h2 class="list__title"> Liste des clients </h2>
<table>
    <thead>
        <tr class="table100-head">
            <th class="column1">Nom</th>
            <th class="column2">Prénom</th>
            <th class="column3">Adresse</th>
            <th class="column4">Téléphone</th>
            <th class="column5">Mail</th>
            <th class="column6">Mdp</th>
            <th class="column7">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $data) { ?>
        <tr>
            <td class="column1"><?= $data['nom'] ?></td>
            <td class="column2"><?= $data['prenom'] ?></td>
            <td class="column3"><?= $data['adresse'] ?></td>
            <td class="column4"><?= $data['tel'] ?></td>
            <td class="column5"><?= $data['mail'] ?></td>
            <td class="column6"><?= $data['mdp'] ?></td>
            <td class="column7"><a href="admin?page=6&select=client&delete=<?= $data['id_user'] ?>"><i style="color: red;" class="fas fa-user-times"></i></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>