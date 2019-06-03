<?php
//var_dump($resultats);
				echo "<table border -1>
						<tr> <td> ID Staff </td> <td> Login </td>
						<td> Mot de Passe </td> <td> Nom </td> <td> Prénom </td>
						</tr>";

				foreach ($resultats as $unResultat)
				{
					echo "<tr> <td>".$unResultat['idstaff']."</td>
							   <td>".$unResultat['login']."</td>
							   <td>".$unResultat['mdp']."</td>							 
							   <td>".$unResultat['nom']."</td>
							   <td>".$unResultat['prenom']."</td>
							    </tr>";
				}
				echo "</table>";
?>