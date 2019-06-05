<?php
	require_once ("modele/modele.php");
	class Controleur
	{
		private $unModele ;

		public function __construct ($serveur, $bdd, $user, $mdp)
		{
			//instaniation de la classe Modele
			$this->unModele = new Modele ($serveur, $bdd, $user, $mdp);
		}

		public function connexion($user, $mdp) {
			if($this->unModele->connexion($user, $mdp) == null ) {
				return null;
			} else {
				$resultat = $this->unModele->connexion($user, $mdp);
				$_SESSION['pseudo'] = $resultat['pseudo'];
				$_SESSION['id_user'] = $resultat['id'];
				$_SESSION['mdp'] = $resultat['mdp'];
				$_SESSION['email'] = $resultat['email'];
				$_SESSION['admin_lvl'] = intval($resultat['admin_lvl']);

				if ($resultat['admin_lvl'] == 0) {
					header("Location:index.php");
					exit();
				} elseif ($resultat['admin_lvl'] > 0) {
					header("Location:admin.php");
					exit();
				}
			}
		}

		public function verifAdmin() {
			if(isset($_SESSION['admin_lvl'])) {
				if($_SESSION['admin_lvl'] > 0) {
					return true;
				}
			}
		}
	}
 ?>