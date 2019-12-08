<h2> Liste des véhicules de clients </h2>
<table>
    <thead>
    <tr class="table100-head">
        <th class="column1">Nom du client</th>
        <th class="column2">Prénom du client/th>
        <th class="column3">Marque</th>
        <th class="column4">Modèle</th>
        <th class="column5">Date d'immatriculation</th>
        <th class="column6">immatriculation</th>
        <th class="column7">Type de véhicule</th>
        <th class="column8">Cylindrée</th>
        <th class="column9">Énergie</th>
        <th class="column10">Type de boite</th>
        <th class="column11">État</th>
        <th class="column12">Kilométrage</th>
        <th class="column13">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data as $data) { ?>
        <tr onclick="document.location = '/?delete=<?= $data['id_vehicule'] ?>'";>
            <td class="column1"><?= $data['nom'] ?></td>
            <td class="column2"><?= $data['prenom'] ?></td>
            <td class="column3"><?= $data['marque'] ?></td>
            <td class="column4"><?= $data['modele'] ?></td>
            <td class="column5"><?= $data['date_immat'] ?></td>
            <td class="column6"><?= $data['immatriculation'] ?></td>  
            <td class="column7"><?= $data['type_vehicule'] ?></td>
            <td class="column8"><?= $data['cylindree'] ?></td>
            <td class="column9"><?= $data['energie'] ?></td>
            <td class="column11"><?= $data['type_boite'] ?></td>
            <td class="column12"><?= $data['etat'] ?></td>
            <td class="column13"><?= $data['km'] ?></td>
            <td class="column14"><a href="admin.php?page=5&select=client&delete=<?= $data['id_vehicule'] ?>"><i style="color: red;" class="fas fa-user-times"></i></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<style type="text/css">
h2 {
    margin-top: 50px;
    text-align: center;
}    
</style>