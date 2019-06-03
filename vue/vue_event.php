<?php
//var_dump($resultats);
				echo "<table border = 1>
						<tr> <td> ID Event </td> <td> Désignation </td>
							 <td> Date </td> <td> Heure de début </td> <td> Prix </td>
							 <td> Lieu </td> <td> ID Catégorie </td> </tr> " ;

				foreach ($resultats as $unResultat)
				{
					echo "<tr> <td>".$unResultat['idevent']."</td>
							   <td>".$unResultat['designation']."</td>
							   <td>".$unResultat['date_event']."</td>
							   <td>".$unResultat['heure_debut']."</td>
							   <td>".$unResultat['prix']."</td>
							   <td>".$unResultat['lieu_event']."</td>
							   <td>".$unResultat['libelle']."</td>
						  </tr>";
				}
				echo "</table>";
			?>