<form method="post" action="">
	<table border=0>
		<tr> <td> Désignation </td>
			 <td> <input type="text" name="designation"></td>
		</tr>
		<tr> <td> Date </td>
			 <td> <input type="text" name="date_event"></td>
		</tr>
		<tr> <td> Heure de début </td>
			 <td> <input type="text" name="heure_debut"></td>
		</tr>
		<tr> <td> Prix </td>
			 <td> <input type="text" name="prix"></td>
		</tr>
		<tr> <td> Lieu </td>
			 <td> <input type="text" name="lieu_event"></td>
		</tr>
		<tr> <td> Catégorie </td>
			 <td> <select name="idcategorie">
			 		<?php
			 		foreach ($lesCateg as $uneCateg)
			 		{
			 			echo "<option value='".$uneCateg['idcategorie']."'>"
                        .$uneCateg['libelle']."</option>";
			 		}
			 		?>
			 	  </select>
			 </td>
		</tr>
		<tr> <td> <input type="reset" name="Annuler" value="Annuler" class="btn btn-primary"></td>
			 <td> <input type="submit" name="Valider" value="Valider" class="btn btn-primary"></td>
		</tr>
	</table>
</form>