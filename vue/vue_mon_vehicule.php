<h3 style="text-align: center; margin-top: 100px;">
	Mes véhicules 
</h3>

<table border="1">
	<tr> <td> Véhicule </td> 
			<td> Modèle </td>
			<td> Millesime </td>
			<td> Kilométrage </td>
			<td> Immatriculation </td>
	</tr>
	<tr> <td><img src="<?= $resultat['img'] ?>" style="width: 300px" alt="img" /></td>
			<td><?= $resultat['modele'] ?></td>
			<td><?= $resultat['millesime'] ?></td>
			<td><?= $resultat['kilometrage'] ?></td>
			<td><?= $resultat['immatriculation'] ?></td>
	</tr>
</table>

<div class="mon_vehicule_page">
	<a href="#">Faire reviser</a>
	<a href="#">Faire reparer</a>
	<a href="#">Vendre</a>
</div>


