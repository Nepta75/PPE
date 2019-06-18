
<table>
    <thead>
        <tr class="table100-head">
            <th class="column1">Nb Vehicule Occas</th>
            <th class="column2">Nb Vehicule Neuf</th>
            <th class="column4">Nb client</th>
            <th class="column5">Nb De resa à confirmer</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td class="column1"><a href="admin.php?page=1"><?= count($nbVehiculeOcc) ?></a></td>
                <td class="column2"><a href="admin.php?page=1"><?= count($nbVehiculeNeuf) ?></a></td>
                <td class="column4"><a href="admin.php?page=6"><?= $nbClient ?></a></td>
                <td class="column5"><a href="admin.php?page=7"><?= $nbEssai ?></a></td>
            </tr>
    </tbody>
</table>

<h3 style="text-align: center; margin-top: 100px;">
	Listes des vehicules
</h3>

<b>Neuf</b>
<table border="1">
	<tr>
			<td> Modèle </td>
			<td> Millesime </td>
			<td> PRIX </td>
			<td> Immatriculation </td>
	</tr>
    <?php foreach($nbVehiculeNeuf as $nbVehiculeNeuf) { ?>
	<tr></td>
			<td><?= $nbVehiculeNeuf['modele'] ?></td>
			<td><?= $nbVehiculeNeuf['millesime'] ?></td>
			<td><?= $nbVehiculeNeuf['prix'] ?></td>
			<td><?= $nbVehiculeNeuf['immatriculation'] ?></td>
	</tr>
    <?php }?>
</table>

<b>Occasion</b>
<table border="1">
	<tr>
			<td> Modèle </td>
			<td> Millesime </td>
			<td> Kilométrage </td>
			<td> Immatriculation </td>
	</tr>
    <?php foreach($nbVehiculeOcc as $nbVehiculeOcc) { ?>
	<tr></td>
			<td><?= $nbVehiculeOcc['modele'] ?></td>
			<td><?= $nbVehiculeOcc['millesime'] ?></td>
			<td><?= $nbVehiculeOcc['kilometrage'] ?></td>
			<td><?= $nbVehiculeOcc['immatriculation'] ?></td>
	</tr>
    <?php }?>
</table>


