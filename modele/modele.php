<?php
class Modele
{
	private $unPdo ;

	public function __construct ($serveur, $bdd, $user, $mdp)
	{
		$this->unPdo = null;
		try{
		//connexion à la base de données en utlisant la classe PDO
		$this->unPdo = new PDO ("mysql:host=".$serveur.";dbname=".$bdd,$user,$mdp);
		}
		catch (PDOException $exp)
		{
			echo "Erreur de connexion à la base de données";
			//afficher le message d'erreur PHP
			echo $exp->getMessage();
		}
	}

	function connexion ($user, $mdp) {
		if($this->unPdo != null) {
			$requete = 'select * from utilisateur where pseudo = :user and mdp = :mdp';
			$verif = $this->unPdo->prepare($requete);
			$verif->execute(array(":user"=>$user, ":mdp"=>$mdp));

			$resultat = $verif->fetch();
			return $resultat;
		}
	}

	public function selectAllUsers() {
			$requete = "select * from utilisateur";
			$select = $this->unPdo->query($requete);
			return $select;
	}

	public function selectVehiculeClient($iduser) {
		$requete = "
		SELECT v.idvehiculeclient, u.pseudo, v.iduser, v.immatriculation, v.type_vehicule, v.modele, v.millesime,
		v.kilometrage, v.cylindree, v.energie, v.type_boite, v.date_immat, v.descriptif, v.valide, v.prix,
		v.img, v.date_rdv, v.heure_rdv, v.type_rdv
		FROM utilisateur u
		JOIN vehicule_client v on v.iduser = u.iduser
		WHERE v.iduser = :iduser
		";

		$select = $this->unPdo->prepare($requete);
		$select->execute(array(":iduser"=>$iduser));
		$resultat = $select->fetch();
		return $resultat;
	}

	public function insertEvent($tab)
	{
		if ($this->unPdo!=null)
		{
			$requete = "insert into event values (null, :designation, :date_event, :heure_debut, :prix, :lieu_event, :idcategorie);";
			$donnees = array(":designation"=>$tab['designation'],
							 ":date_event"=>$tab['date_event'],
							 ":heure_debut"=>$tab['heure_debut'],
							 ":prix"=>$tab['prix'],
							 ":lieu_event"=>$tab['lieu_event'],
							 ":idcategorie"=>$tab['idcategorie']);
			$insert = $this->unPdo->prepare ($requete);
			$insert->execute($donnees);
		}
	}

	public function deleteEvent ($idevent)
	{
		if ($this->unPdo != null)
		{
			$requete = "delete from event where idevent= :idevent;"; 
			$donnees = array(":idevent"=>$idevent);
			$delete = $this->unPdo->prepare($requete);
			$delete->execute($donnees);
		}
	}

	public function verifConnexion ($login , $mdp)
	{
		if ($this->unPdo != null)
		{
			$requete ="select * from staff where login = :login and mdp = :mdp;";
			$donnees = array(":login"=>$login, ":mdp"=>$mdp);
			$select = $this->unPdo->prepare($requete);
			$select->execute($donnees);
			$resultat = $select->fetch();
			//var_dump($resultat);
			return $resultat ;
		}
	}
	/**************** Categorie *************/

	public function insertCategorie ($tab)
	{
		if($this->unPdo != null)
		{
			$requete = "insert into categorie values (null, :libelle);";
			$donnees = array(":libelle"=>$tab['libelle']);
			$insert = $this->unPdo->prepare($requete);
			$insert->execute($donnees);
		}
	}
	public function deleteCategorie ($idcategorie)
	{
		if($this->unPdo != null)
		{
			$requete = "delete from categorie where idcategorie = :idcategorie;";
			$donnees = array(":idcategorie"=>$idcategorie);
			$delete = $this->unPdo->prepare($requete);
			$delete->execute($donnees);
		}
	}
	public function selectCategories ()
	{
		if($this->unPdo != null)
		{
			$requete = "select * from categorie ;";
			$select = $this->unPdo->prepare($requete);
			$select->execute ();
			$resultats = $select->fetchAll();
			return $resultats;
		}
	}

	/****************** STAFF *****************/

	public function insertStaff ($tab)
	{
		if($this->unPdo != null)
			{
				$requete = "insert into staff values (null, :login, :mdp, :nom, :prenom);";
				$donnees = array(":login"=>$tab['login'],
								 ":mdp"=>$tab['mdp'],
								 ":nom"=>$tab['nom'],
								 ":prenom"=>$tab['prenom']);
				$insert = $this->unPdo->prepare ($requete);
				$insert->execute($donnees);
			}	
	}

	public function deleteStaff ($idstaff)
	{
		if ($this->unPdo != null)
		{
			$requete = "delete from staff where idstaff= :idstaff;"; 
			$donnees = array(":idstaff"=>$idstaff);
			$delete = $this->unPdo->prepare($requete);
			$delete->execute($donnees);
		}
	}

	public function selectStaff ()
	{
		if($this->unPdo != null)
		{
			$requete = "select * from staff ;";
			$select = $this->unPdo->prepare($requete);
			$select->execute ();
			$resultats = $select->fetchAll();
			return $resultats;
		}
	}

} 	//fin de la classe
?>

