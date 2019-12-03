<?php
class ModeleAdmin
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

    public function selectAllClients() {
        $requete = "select * from view_client";
        $select = $this->unPdo->prepare($requete);
        return $select->fetchAll();
    }

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




    //Modification vehicule

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

    public function updateVehiculeNeuf($immatriculation, $type, $modele, $millesime, $cylindree
    ,$energie, $typeBoite, $prix, $date_imma, $url_img){

        $requete = "UPDATE vehicule_neuf SET
        type_vehicule = :type_vehicule, modele = :modele, millesime = :millesime, cylindree = :cylindree,
        energie = :energie, type_boite = :type_boite, prix = :prix, date_immat = :date_immat, img = :img
        WHERE immatriculation = :immatriculation";

        $update = $this->unPdo->prepare($requete);
        $update->execute(array(
            ":type_vehicule"=>$type,
            ":modele"=>$modele,
            ":millesime"=>$millesime,
            ":cylindree"=>$cylindree,
            ":energie"=>$energie,
            ":type_boite"=>$typeBoite,
            ":prix"=>$prix,
            ":date_immat"=>$date_imma,
            ":img"=>$url_img,
            ":immatriculation"=>$immatriculation,
        ));
    }

    public function updateVehiculeOccas($immatriculation, $type, $modele, $millesime, $cylindree
    ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img) {
        $requete = "UPDATE vehicule_occasion SET
        type_vehicule = :type_vehicule, modele = :modele, millesime = :millesime,
        kilometrage = :kilometrage, cylindree = :cylindree,
        energie = :energie, type_boite = :type_boite, prix = :prix, date_immat = :date_immat,
        descriptif = :descriptif, valide = :valide, img = :img
        WHERE immatriculation = :immatriculation";

        $update = $this->unPdo->prepare($requete);
        $update->execute(array(
            ":type_vehicule"=>$type,
            ":modele"=>$modele,
            ":millesime"=>$millesime,
            ":kilometrage"=>$km,
            ":cylindree"=>$cylindree,
            ":energie"=>$energie,
            ":type_boite"=>$typeBoite,
            ":prix"=>$prix,
            ":date_immat"=>$date_imma,
            ":descriptif"=>$descriptif,
            ":valide"=>$valid,
            ":img"=>$url_img,
            ":immatriculation"=>$immatriculation,
        ));
    }

    public function updateVehiculeClient($user, $immatriculation, $type, $modele, $millesime, $cylindree
    ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img) {

        $requete = "UPDATE vehicule_client SET
        iduser = :user, type_vehicule = :type_vehicule, modele = :modele, millesime = :millesime,
        kilometrage = :kilometrage, cylindree = :cylindree,
        energie = :energie, type_boite = :type_boite, prix = :prix, date_immat = :date_immat,
        descriptif = :descriptif, valide = :valide, img = :img
        WHERE immatriculation = :immatriculation";

        $update = $this->unPdo->prepare($requete);

        $update->execute(array(
            ":user"=>intval($user),
            ":type_vehicule"=>$type,
            ":modele"=>$modele,
            ":millesime"=>$millesime,
            ":kilometrage"=>$km,
            ":cylindree"=>$cylindree,
            ":energie"=>$energie,
            ":type_boite"=>$typeBoite,
            ":prix"=>$prix,
            ":date_immat"=>$date_imma,
            ":descriptif"=>$descriptif,
            ":valide"=>$valid,
            ":img"=>$url_img,
            ":immatriculation"=>$immatriculation,
        ));
    }

    //SUPPRESSION VEHICULE

    public function deleteVehiculeNeuf($immat) {
        $requete = "Delete from vehicule_neuf where immatriculation = :immatriculation";
        $delete = $this->unPdo->prepare($requete);
        $delete->execute(array(":immatriculation"=>$immat));
    }

    public function deleteVehiculeOccasion($immat) {
        $requete = "Delete from vehicule_occasion where immatriculation = :immatriculation";
        $delete = $this->unPdo->prepare($requete);
        $delete->execute(array(":immatriculation"=>$immat));
    }

    public function deleteVehiculeClient($immat) {
        $requete = "Delete from vehicule_client where immatriculation = :immatriculation";
        $delete = $this->unPdo->prepare($requete);
        $delete->execute(array(":immatriculation"=>$immat));
    }

    //CLIENTS

    public function deleteUser($id) {
        $requete = "delete from utilisateur where idclient = :idclient";
        $delete = $this->unPdo->prepare($requete);
        $delete->execute(array(
            ":idclient"=>$id,
        ));

        $requete2 = "delete from client where idclient = :idclient";
        $delete2 = $this->unPdo->prepare($requete2);
        $delete2->execute(array(
            ":idclient"=>$id,
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
        $requete = "SELECT e.idessayer, e.idvehiculeneuf, e.idclient, e.date_essai, e.heure_essai, e.status_essai, c.nom, c.prenom, c.email, c.tel, c.adresse_rue, c.adresse_cp, c.adresse_ville,
        v.modele, v.immatriculation, v.idvehiculeneuf
        FROM client c inner join essayer e
            on c.idclient = e.idclient
        inner join vehicule_neuf v
            on e.idvehiculeneuf = v.idvehiculeneuf
        ";

        $select = $this->unPdo->query($requete);
        $resultat = $select->fetchAll();
        return $resultat;
    }

    public function confirmEssai($idessayer) {
        $requete = "UPDATE essayer SET status_essai = 'Confirmer' WHERE idessayer = :idessayer";
        $update = $this->unPdo->prepare($requete);
        $update->execute(array(":idessayer"=>$idessayer));
    }

    public function deleteEssayer($id) {
        $requete = "delete from essayer where idessayer = :id";
        $delete = $this->unPdo->prepare($requete);
        $delete->execute(array(":id"=>$id));
    }
} 
    
?>