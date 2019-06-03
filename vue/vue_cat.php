<?php
//var_dump($resultats);
				echo "<table border = 1>
						<tr> <td> ID Catégorie </td> <td> Libellé </td> </tr>";

				foreach ($resultats as $unResultat)
				{
					echo "<tr> <td>".$unResultat['idcategorie']."</td>
							   <td>".$unResultat['libelle']."</td> </tr>";
				}
				echo "</table>";
?>