<?php
class ModeleAdmin
{
	private $unPdo ;

	public function __construct ($serveur, $bdd, $user, $mdp)
	{
		$this->unPdo = null;
		try{
		//connexion à la base de données en utlisant la classe PDO
		$this->unPdo = new PDO ("mysql:host=".$serveur.";dbname=".$bdd,$user,$mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}
		catch (PDOException $exp)
		{
			echo "Erreur de connexion à la base de données";
			//afficher le message d'erreur PHP
			echo $exp->getMessage();
		}
    }

    //---------------------- Utils -----------------------\\
    
    public function verifImmat($immat) {
        $requete = "select immatriculation from vehicule where immatriculation = :immat";
        $select = $this->unPdo->prepare($requete);
        $select->execute(array(":immat"=>$immat));
        return $select->fetchAll();
    }

    public function countFromTable($table) {
        $requete = "select count(*) from $table";
        $select = $this->unPdo->query($requete);
        return $select->fetchColumn();
    }

    //-------------------- Les sélections --------------------\\

    public function selectAllClients() {
        $requete = "select * from view_client";
        $select = $this->unPdo->query($requete);
        return $select->fetchAll();
    }

    public function selectClient($id) {
        $requete = "select * from view_client where id_user = :id";
        $select = $this->unPdo->prepare($requete);
        $select->execute(array(":id"=>$id));
        return $select->fetchAll();
    }

    public function selectAllTechniciens() {
        $requete = "select * from view_technicien";
        $select = $this->unPdo->query($requete);
        return $select->fetchAll();
    }

    public function selectAllAdmins() {
        $requete = "select * from view_admin";
        $select = $this->unPdo->query($requete);
        return $select->fetchAll();
    }

    public function selectAllVehNeufs() {
        $requete = "select * from view_veh_neuf";
        $select = $this->unPdo->query($requete);
        return $select->fetchAll();
    }
    
    public function selectAllVehOccas() {
        $requete = "select * from view_veh_occas";
        $select = $this->unPdo->query($requete);
        return $select->fetchAll();
    }

    public function selectAllVehClients() {
        $requete = "select * from view_veh_client";
        $select = $this->unPdo->query($requete);
        return $select->fetchAll();
    }

    public function selectAllDevis() {
        $requete = "select * from view_devis";
        $select = $this->unPdo->query($requete);
        return $select->fetchAll();
    }

    public function selectIdVehicule($immatriculation) {
        $requete = "select id_vehicule from vehicule where immatriculation=:immat";
        $select = $this->unPdo->prepare($requete);
        $select->execute(array(":immat"=>$immatriculation));
        return $select->fetchColumn();
    }

    //---------------------- Suppressions de véhicule -----------------\\

    public function deleteVehicule($idVeh) {
        $requete = "delete from vehicule where id_vehicule = :id";
        $delete = $this->unPdo->prepare($requete);
        $delete->execute(array(":id"=>$idVeh));
    }

    //---------------------- Ajout Véchicule -----------------------\\

    public function addVehiculeNeuf($marque, $immatriculation, $type, $modele, $cylindree,
    $energie, $typeBoite, $prix, $img1, $img2)
    {
        $requete = 'call insert_veh_neuf(:marque, :modele, :immatriculation, :type, :cylindree, 
        :energie, :typeBoite, :prix, :img1, :img2)';
        try {
            $insert = $this->unPdo->prepare($requete);
            $insert->execute(array(
                ":marque"=>$marque,
                ":modele"=>$modele,
                ":immatriculation"=>$immatriculation,
                ":type"=>$type,
                ":cylindree"=>$cylindree,
                ":energie"=>$energie,
                ":typeBoite"=>$typeBoite,
                ":prix"=>$prix,
                ":img1"=>$img1,
                ":img2"=>$img2,
            ));
        } catch (\PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
        }
    }

    public function addVehiculeOccas($marque, $modele, $date_imma, $immatriculation,
    $type, $cylindree ,$energie, $typeBoite, $etat, $info, $km, $prix, $img1, $img2) {
        $requete = "call insert_veh_occas(:marque, :modele, :date_imma, :immatriculation, :type, :cylindree,
        :energie, :typeBoite, :etat, :info, :km, :prix, :img1, :img2)";
        try {
            $insert = $this->unPdo->prepare($requete);
            $insert->execute(array(
                ":marque"=>$marque,
                ":modele"=>$modele,
                ":date_imma"=>$date_imma,
                ":immatriculation"=>$immatriculation,
                ":type"=>$type,
                ":cylindree"=>$cylindree,
                ":energie"=>$energie,
                ":typeBoite"=>$typeBoite,
                ":etat"=>$etat,
                ":info"=>$info,
                ":km"=>$km,
                ":prix"=>$prix,
                ":img1"=>$img1,
                ":img2"=>$img2,
            ));
        } catch (\PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
        }
    }

    
    public function addVehiculeClient($user, $marque, $modele, $date_imma, $immatriculation, $type
    ,$cylindree, $energie, $typeBoite, $etat, $info, $km, $img1, $img2) {
        $requete = "call insert_veh_client(:user, :marque, :modele, :date_imma, :immatriculation, 
            :type, :cylindree, :energie, :typeBoite, :etat, :info, :km, :img1, :img2)";
        try {
            $insert = $this->unPdo->prepare($requete);
            $insert->execute(array(
                ":user"=>$user,
                ":marque"=>$marque,
                ":modele"=>$modele,
                ":date_imma"=>$date_imma,
                ":immatriculation"=>$immatriculation,
                ":type"=>$type,
                ":cylindree"=>$cylindree,
                ":energie"=>$energie,
                ":typeBoite"=>$typeBoite,
                ":etat"=>$etat,
                ":info"=>$info,
                ":km"=>$km,
                ":img1"=>$img1,
                ":img2"=>$img2,
            ));
        } catch (\PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
        }
    }

    //---------------------- Update Véchicule -----------------------\\

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

    public function updateVehiculeNeuf($id, $marque, $immatriculation, $type, $modele, $cylindree,
    $energie, $typeBoite, $prix, $img1, $img2){
        $requete = 'UPDATE vehicule SET marque = :marque, modele = :modele, immatriculation = :immatriculation, type_vehicule = :type, cylindree = :cylindree, 
        energie = :energie, type_boite = :typeBoite, prix = :prix, img_1 = :img1, img_2 = :img2 WHERE id_vehicule = :id';
        try {
            $insert = $this->unPdo->prepare($requete);
            $insert->execute(array(
                ":id"=>$id,
                ":marque"=>$marque,
                ":modele"=>$modele,
                ":immatriculation"=>$immatriculation,
                ":type"=>$type,
                ":cylindree"=>$cylindree,
                ":energie"=>$energie,
                ":typeBoite"=>$typeBoite,
                ":prix"=>$prix,
                ":img1"=>$img1,
                ":img2"=>$img2,
            ));
        } catch (\PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
        }
    }

    public function updateVehiculeOccas($id, $marque, $modele, $date_imma, $immatriculation,
    $type, $cylindree ,$energie, $typeBoite, $etat, $info, $km, $prix, $img1, $img2) {
        $requete = 'UPDATE vehicule SET marque = :marque, modele = :modele, immatriculation = :immatriculation, type_vehicule = :type, cylindree = :cylindree, 
        energie = :energie, type_boite = :typeBoite, prix = :prix, img_1 = :img1, img_2 = :img2 WHERE id_vehicule = :id';

        $requete2 = 'UPDATE vehicule_occasion SET date_immat = :date_imma, etat = :etat, information = :info, km = :km
        WHERE id_vehicule = :id';
        try {
            $insert = $this->unPdo->prepare($requete);
            $insert->execute(array(
                ":id"=>$id,
                ":marque"=>$marque,
                ":modele"=>$modele,
                ":immatriculation"=>$immatriculation,
                ":type"=>$type,
                ":cylindree"=>$cylindree,
                ":energie"=>$energie,
                ":typeBoite"=>$typeBoite,
                ":prix"=>$prix,
                ":img1"=>$img1,
                ":img2"=>$img2,
            ));

            $insert2 = $this->unPdo->prepare($requete2);
            $insert2->execute(array(
                ":id"=>$id,
                ":date_imma"=>$date_imma,
                ":etat"=>$etat,
                ":info"=>$info,
                ":km"=>$km,
            ));
        } catch (\PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
        }
    }

    
    public function updateVehiculeClient($user, $id, $marque, $modele, $date_imma, $immatriculation, $type
    ,$cylindree, $energie, $typeBoite, $etat, $info, $km, $img1, $img2) {
        $requete = 'UPDATE vehicule SET marque = :marque, modele = :modele, immatriculation = :immatriculation, type_vehicule = :type, cylindree = :cylindree, 
        energie = :energie, type_boite = :typeBoite, prix = :prix, img_1 = :img1, img_2 = :img2 WHERE id_vehicule = :id';

        $requete2 = 'UPDATE vehicule_client SET date_immat = :date_imma, etat = :etat, information = :info, km = :km
        WHERE id_vehicule = :id';
        try {
            $insert = $this->unPdo->prepare($requete);
            $insert->execute(array(
                ":id"=>$id,
                ":marque"=>$marque,
                ":modele"=>$modele,
                ":immatriculation"=>$immatriculation,
                ":type"=>$type,
                ":cylindree"=>$cylindree,
                ":energie"=>$energie,
                ":typeBoite"=>$typeBoite,
                ":prix"=> null,
                ":img1"=>$img1,
                ":img2"=>$img2,
            ));

            $insert2 = $this->unPdo->prepare($requete2);
            $insert2->execute(array(
                ":id"=>$id,
                ":date_imma"=>$date_imma,
                ":etat"=>$etat,
                ":info"=>$info,
                ":km"=>$km,
            ));
        } catch (\PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
        }
    }

    public function deleteUser($id) {
        $requete = "delete from user where id_user = :id";
        $delete = $this->unPdo->prepare($requete);
        $delete->execute(array(
            ":id"=>$id,
        ));
    }

    public function deleteDevis($id) {
        $requete = "delete from devis where id_devis = :id";
        $delete = $this->unPdo->prepare($requete);
        $delete->execute(array(
            ":id"=>$id,
        ));
    }

    public function deleteEssayer($id) {
        $requete = "delete from essayer where id_essayer = :id";
        $delete = $this->unPdo->prepare($requete);
        $delete->execute(array(
            ":id"=>$id,
        ));
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
    
    public function updateInscription($tab, $id) {
        $requete1 = "UPDATE client set nom = :nom, prenom = :prenom, adresse_rue = :adresse_rue,
        adresse_ville = :adresse_ville, adresse_cp = :adresse_cp, email = :email, tel = :tel WHERE
        idclient = :idclient";

		$insert = $this->unPdo->prepare($requete1);
		$insert->execute(array(
			":nom"=>$tab['nom'],
			":prenom"=>$tab['prenom'],
			":adresse_rue"=>$tab['adresse_rue'],
			":adresse_ville"=>$tab['ville'],
			":adresse_cp"=>$tab['adresse_cp'],
			":email"=>$tab['mail'],
            ":tel"=>$tab['tel'],
            ":idclient"=>$id,
		));

		$requete2 = "UPDATE utilisateur set pseudo = :pseudo, mdp = :mdp, email = :email, admin_lvl = :admin_lvl where 
		idclient = :idclient";
		$insert2 = $this->unPdo->prepare($requete2);
		$insert2->execute(array(
			":idclient"=>$id,
			":pseudo"=>$tab['pseudo'],
			":mdp"=>$tab['mdp'],
            ":email"=>$tab['mail'],
            ":admin_lvl"=>$tab['admin_lvl'],
		));
    }

    public function udapteEssayer($data) {
        $requete = 'update essayer set statut = :statut where id_essayer = :id';
        $update = $this->unPdo->prepare($requete);
        $update->execute(array(
            ":statut"=>$data['statut'],
            ":id"=>$data['id_essayer'],
        ));
    }

    public function updateStatutDevis($data) {
        $requete = 'update devis set statut = :statut where id_devis = :id';
        $update = $this->unPdo->prepare($requete);
        $update->execute(array(
            ":statut"=>$data['statut'],
            ":id"=>$data['id'],
        ));
    }

    //ESSAYER VEHICULE

    public function insertEssayer($tab, $idVehicule, $idclient) {
        $requete = "INSERT INTO essayer (idvehiculeneuf, idclient, date_essai, heure_essai, status_essai) 
        VALUES (:idvehicule, :idclient, :date_essai, :heure_essai, 'En Attente')";

		$insert = $this->unPdo->prepare($requete);
		$insert->execute(array(
			":idvehicule"=>$idVehicule,
			":idclient"=>$idclient,
			":date_essai"=>$tab['d'],
			":heure_essai"=>$tab['t'],
		));

    }

    public function selectAllEssai(){
        $requete = "SELECT * FROM view_essayer";
        $select = $this->unPdo->query($requete);
        return $select->fetchAll();
    }

    public function selectEssai($id){
        $requete = "SELECT * FROM view_essayer where id_essayer = :id";
        $select = $this->unPdo->prepare($requete);
        $select->execute(array(':id'=>$id));
        return $select->fetch();
    }

    public function confirmEssai($idessayer) {
        $requete = "UPDATE essayer SET status_essai = 'Confirmer' WHERE idessayer = :idessayer";
        $update = $this->unPdo->prepare($requete);
        $update->execute(array(":idessayer"=>$idessayer));
    }
} 
    
?>