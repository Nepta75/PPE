<h2> Liste des essais </h2>

<table>
    <thead>
        <tr class="table100-head">
            <th class="column1">Nom</th>
            <th class="column2">Prénom</th>
            <th class="column3">Mail</th>
            <th class="column4">Adresse</th>
            <th class="column5">Marque</th>
            <th class="column6">Modèle</th>
            <th class="column7">Immatriculation</th>
            <th class="column8">Date d'essai</th>
            <th class="column9">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $data) { ?>
            <tr onclick="document.location = 'admin.php?page=6&action=m&id_user=<?= $data['id_user'] ?>'";>
                <td class="column1"><?= $data['nom'] ?></td>
                <td class="column2"><?= $data['prenom'] ?></td>
                <td class="column3"><?= $data['mail'] ?></td>
                <td class="column4"><?= $data['adresse'] ?></td>
                <td class="column5"><?= $data['marque'] ?></td>
                <td class="column6"><?= $data['modele'] ?></td>  
                <td class="column7"><?= $data['immatriculation'] ?></td>
                <td class="column8"><?= $data['date_essayage'] ?></td>
                <td class="column9"><a href="admin.php?page=7&action=x&id_user=<?= $data['id_user'] ?>"><i style="color: red;" class="fas fa-user-times"></i></a></td>
            </tr>
    <?php } ?>
    </tbody>
</table>