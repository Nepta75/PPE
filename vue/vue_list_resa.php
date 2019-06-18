
<table>
    <thead>
        <tr class="table100-head">
            <th class="column1">Nom</th>
            <th class="column2">Prenom</th>
            <th class="column4">Adresse</th>
            <th class="column5">tel</th>
            <th class="column6">email</th>
            <th class="column8">Immatriculation</th>
            <th class="column8">Modele</th>
            <th class="column8">Date</th>
            <th class="column8">Heure</th>
            <th class="column8">Status</th>
            <th class="column8">Supp</th>
            <th class="column8">Confirm</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $data) { ?>
            <tr onclick="document.location = 'admin.php?page=6&action=m&iduser=<?= $data['idclient'] ?>'";>
                <td class="column1"><?= $data['nom'] ?></td>
                <td class="column2"><?= $data['prenom'] ?></td>
                <td class="column4"><?= $data['adresse_rue'].", ".$data['adresse_cp'].", ".$data['adresse_ville'] ?></td>
                <td class="column5"><?= $data['tel'] ?></td>
                <td class="column6"><?= $data['email'] ?></td>
                <td class="column6"><?= $data['immatriculation'] ?></td>
                <td class="column6"><?= $data['modele'] ?></td>
                <td class="column6"><?= $data['date_essai'] ?></td>
                <td class="column6"><?= $data['heure_essai'] ?></td>
                <td class="column6"><?= $data['status_essai'] ?></td>
                <td class="column8"><a href="admin.php?page=7&idessayer=<?= $data['idessayer'] ?>&action=x&iduser=<?= $data['idclient'] ?>"><i style="color: red;" class="fas fa-user-times"></i></a></td>
                <td class="column8"><a href="admin.php?page=7&idessayer=<?= $data['idessayer'] ?>&action=c&iduser=<?= $data['idclient'] ?>&immat=<?= $data['immatriculation'] ?>&date=<?= $data['date_essai'] ?>&heure=<? $data ['heure_essai'] ?>"><i style="color: green;" class="fas fa-check-circle"></i></a></td>
            </tr>
    <?php } ?>
    </tbody>
</table>