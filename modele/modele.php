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

	public function verifImmat($immat) {
        $requete = "select immatriculation from vehicule where immatriculation = :immat";
        $select = $this->unPdo->prepare($requete);
        $select->execute(array(":immat"=>$immat));
        return $select->fetchAll();
	}
	
	public function selectAdmin($id) {
		$requete = "select * from view_admin where id_user = :id";
        $select = $this->unPdo->prepare($requete);
        $select->execute(array(":id"=>intval($id)));
        return $select->fetch();
	}

	public function connexion ($mail, $mdp) {
		if($this->unPdo != null) {
			$requete = 'SELECT * from user WHERE mail = :mail AND mdp = :mdp';
			$verif = $this->unPdo->prepare($requete);
			$verif->execute(array(":mail"=>$mail, ":mdp"=>$mdp));
			$resultat = $verif->fetch();
			return $resultat;
		}
	}

	public function addEssai($data) {
		$requete = "insert into essayer values (null, :id_veh, :id_user, :date, :statut)";
		$insert = $this->unPdo->prepare($requete);
		$insert->execute(array(
			':id_veh'=>$data['id_vehicule'],
			':id_user'=>$data['id_user'],
			':date'=>$data['date'],
			':statut'=>"en attente",
		));
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

		header("Location:/ppe/pages/connexion/index.php?succes=in");
	}

	public function selectAllClients() {
		$requete = "SELECT * from view_client";
		$select = $this->unPdo->query($requete);
		return $select->fetchAll();
	}

	public function selectClient($id) {
		$requete = "SELECT * FROM view_client WHERE id_user = :id_user";
		$select = $this->unPdo->prepare($requete);
		$select->execute(array(":id_user"=>$id));
		$resultat = $select->fetch();
		return $resultat;
	}

	public function selectAllVehiculesNeuf() {
		$requete = "Select * from view_veh_neuf";
		$select = $this->unPdo->query($requete);
		return $select->fetchAll();
	}

	public function selecttreeVehiculesNeuf() {
		$requete = "Select * from view_veh_neuf order by id_vehicule asc limit 3";
		$select = $this->unPdo->query($requete);
		return $select;

	}

	public function selectAllVehiculesOccasion() {
		$requete = "Select * from view_veh_occas";
		$select = $this->unPdo->query($requete);
		return $select->fetchAll();
	}

	public function selecttreeVehiculesOccasion() {
		$requete = "Select * from view_veh_occas order by id_vehicule asc limit 3";
		$select = $this->unPdo->query($requete);
		return $select->fetchAll();

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

	public function selectIdVehicule($immatriculation) {
		$requete = "select id_vehicule from vehicule where immatriculation = :immat";
		$select = $this->unPdo->prepare($requete);
		$select->execute(array(':immat'=>$immatriculation));
		return $select->fetchColumn();
	}

    public function selectVehicule($immatriculation) {
        if ($this->verifImmat($immatriculation)) {
            $type = ["0"=>'neuf', "1"=>'occas', "2"=>'client'];
            $result = ["type"=>'', "data"=>[]];
            $requete = [
                "0"=>"Select * from view_veh_neuf where immatriculation = :immatriculation",
                "1"=>"Select * from view_veh_occas where immatriculation = :immatriculation",
                "2"=>"Select * from view_veh_client where immatriculation = :immatriculation",
            ];

            for($i=0; $i < 3; $i++) {
                if (!empty($result['data'])) return $result;
                $select = $this->unPdo->prepare($requete[$i]);
                $select->execute(array("immatriculation"=>$immatriculation));
                $result = [
                    'type'=>$type[$i], 
                    'data'=>$select->fetch(),
                ];
            }
            return $result;
        }
    }

	//devis

	public function selectDevis($id) {
		$requete = "Select * from view_devis where id_devis = :idDevis";
		$select = $this->unPdo->prepare($requete);
		$select->execute(array(":idDevis"=>$id));
		$resultat = $select->fetch();
		return $resultat;
	}

	public function insertDevis($data) {
		$requete = "INSERT INTO devis VALUES (null, :sujet, :immatriculation, :nom, :prenom, :mail,
		 :adresse, :info, :prix, NOW(), :id_client, :id_technicien)";
		try {
			$insert = $this->unPdo->prepare($requete);
			$insert->execute(array(
				":sujet"=> $data['sujet'],
				":immatriculation"=>$data['immatriculation'],
				":nom"=>$data['nom'],
				":prenom"=>$data['prenom'],
				":mail"=>$data['mail'],
				":adresse"=>$data['adresse'],
				":info"=>$data['info'],
				":prix"=>$data['prix'],
				":id_client"=>$data['id_client'],
				":id_technicien"=> $data['id_technicien']
			));
		} catch (\PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
		}
		
		$lastId = $this->unPdo->lastInsertId();
		header("Location:/ppe/traitement_devis.php?id=".$lastId);
	}
} 	//fin de la classe
?>

