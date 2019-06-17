<h3>
	Mes véhicules 
</h3>

<?php
	echo "<table border = 1>
			<tr> <td> Véhicule </td> 
				 <td> Modèle </td>
				 <td> Millesime </td>
				 <td> Kilométrage </td>
				 <td> Immatriculation </td>
		 	</tr>";
	foreach ($resultats as $unResultat)
	{
		echo "<tr> <td>".$unResultat['img']."</td>
				   <td>".$unResultat['modele']."</td>
				   <td>".$unResultat['millesime']."</td>
				   <td>".$unResultat['kilometrage']."</td>
				   <td>".$unResultat['immatriculation']."</td>
			  </tr>";
	}
	echo "</table>";
?>

