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

	public function connexion ($user, $mdp) {
		if($this->unPdo != null) {
			$requete = 'SELECT u.iduser, u.idclient, c.nom, c.prenom, c.adresse_rue, c.adresse_ville, c.adresse_cp,
			c.tel, u.pseudo, u.mdp, u.email, u.admin_lvl
			FROM client c
			JOIN utilisateur u on u.idclient = c.idclient
			WHERE u.pseudo = :user AND u.mdp = :mdp';
			$verif = $this->unPdo->prepare($requete);
			$verif->execute(array(":user"=>$user, ":mdp"=>$mdp));

			$resultat = $verif->fetch();
			return $resultat;
		}
	}



	public function inscription($tab) {
		$requete1 = "INSERT INTO client (idclient, nom, prenom, adresse_rue, adresse_ville, adresse_cp, email, tel) VALUES 
		(null, :nom, :prenom, :adresse_rue, :adresse_ville, :adresse_cp, :email, :tel)";

		$insert = $this->unPdo->prepare($requete1);
		$insert->execute(array(
			":nom"=>$tab['nom'],
			":prenom"=>$tab['prenom'],
			":adresse_rue"=>$tab['adresse_rue'],
			":adresse_ville"=>$tab['ville'],
			":adresse_cp"=>$tab['adresse_cp'],
			":email"=>$tab['mail'],
			":tel"=>$tab['tel'],
		));

		$lastId = $this->unPdo->lastInsertId();

		$requete2 = "INSERT INTO utilisateur(iduser, idclient, pseudo, mdp, email, admin_lvl) VALUES 
		(null, :idclient, :pseudo, :mdp, :email, 0)";
		$insert2 = $this->unPdo->prepare($requete2);
		$insert2->execute(array(
			":idclient"=>$lastId,
			":pseudo"=>$tab['pseudo'],
			":mdp"=>$tab['mdp'],
			":email"=>$tab['mail'],
		));

		header("Location:gestionclient.php?succes=in");
	}

	public function selectAllUsers() {
			$requete = "SELECT u.iduser, u.idclient, c.nom, c.prenom, c.adresse_rue, c.adresse_ville, c.adresse_cp,
			c.tel, u.pseudo, u.mdp, u.email, u.admin_lvl
			FROM client c
			JOIN utilisateur u on u.idclient = c.idclient";
			$select = $this->unPdo->query($requete);
			return $select;
	}

	public function selectUser($id) {
		$requete = "SELECT u.iduser, u.idclient, c.nom, c.prenom, c.adresse_rue, c.adresse_ville, c.adresse_cp,
		c.tel, u.pseudo, u.mdp, u.email, u.admin_lvl
		FROM client c
		JOIN utilisateur u on u.idclient = c.idclient
		WHERE u.idclient = :idclient";

		$select = $this->unPdo->prepare($requete);
		$select->execute(array(":idclient"=>$id));
		$resultat = $select->fetch();
		return $resultat;
	}

	public function selectAllVehiculesNeuf() {
		$requete = "Select * from vehicule_neuf";
		$select = $this->unPdo->query($requete);
		return $select;
	}

	public function selecttreeVehiculesNeuf() {
		$requete = "Select * from vehicule_neuf order by idvehiculeneuf asc limit 3";
		$select = $this->unPdo->query($requete);
		return $select;

	}

	public function selectAllVehiculesOccasion() {
		$requete = "Select * from vehicule_occasion";
		$select = $this->unPdo->query($requete);
		return $select;
	}

	public function selecttreeVehiculesOccasion() {
		$requete = "Select * from vehicule_occasion where valide = 'oui' order by idvehiculeocc asc limit 3";
		$select = $this->unPdo->query($requete);
		$resultat = $select->fetchAll();
		return $resultat;

	}



	
	public function selectAllVehiculeNeuf() {
		$requete = "Select * from vehicule_neuf";
		$select = $this->unPdo->query($requete);
		$resultat = $select->fetchAll();
		return $resultat;
	}

	public function selectAllVehiculesOccasionDispo() {
		$requete = "Select * from vehicule_occasion where valide = 'oui'";
		$select = $this->unPdo->query($requete);
		return $select;
	}

	public function selectAllVehiculesOccasionIndispo() {
		$requete = "Select * from vehicule_occasion where valide = 'non'";
		$select = $this->unPdo->query($requete);
		return $select;
	}

	public function selectAllVehiculesClient() {
		$requete = "Select * from vehicule_client";
		$select = $this->unPdo->query($requete);
		return $select;
	}
	/* -------------- VEHICULE CLIENT  --------------- */ 

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

	public function selectVehicule($immatriculation) {
		$requete1 = "Select * from vehicule_neuf where immatriculation = :immatriculation";
		$requete2 = "Select * from vehicule_occasion where immatriculation = :immatriculation";
		$requete3 = "Select * from vehicule_client where immatriculation = :immatriculation";


		$select = $this->unPdo->prepare($requete1);
		$select->execute(array("immatriculation"=>$immatriculation));
		$resultat = $select->fetch();

		if ($resultat == null) {
			$select2 = $this->unPdo->prepare($requete2);
			$select2->execute(array("immatriculation"=>$immatriculation));
			$resultat2 = $select2->fetch();

			if ($resultat2 == null) {
				$select3 = $this->unPdo->prepare($requete3);
				$select3->execute(array("immatriculation"=>$immatriculation));
				$resultat3 = $select3->fetch();
				return $resultat3;
			}
			return $resultat2;
		}
		return $resultat;
	}

	//devis

	public function selectDevis($id) {
		$requete = "Select * from devis where iddevis = :iddevis";
		$select = $this->unPdo->prepare($requete);
		$select->execute(array(":iddevis"=>$id));
		$resultat = $select->fetch();
		return $resultat;
	}

	public function insertDevis($data) {
		$requete = "INSERT INTO devis
		(iddevis, idclient, idtechnicien, date_devis, sujet, immatriculation) VALUES 
		(null, :idclient, :user, :date_devis, :sujet, :immatriculation)";

		$insert = $this->unPdo->prepare($requete);
		$insert->execute(array(
			":idclient"=> intval($data['idclient']),
			":user"=>$data['user'],
			":date_devis"=> date("Y-m-d"),
			":sujet"=>$data['sujet'],
			":immatriculation"=>$data['immatriculation'],
		));

		$lastId = $this->unPdo->lastInsertId();
		header("Location:traitement_devis.php?id=".$lastId);
	}
} 	//fin de la classe
?>

