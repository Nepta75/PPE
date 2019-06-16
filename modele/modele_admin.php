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

    public function addVehiculeNeuf($immatriculation, $type, $modele, $millesime, $cylindree,
    $energie, $typeBoite, $prix, $date_imma, $url_img) {
        $requete = "INSERT INTO vehicule_neuf 
        (idvehiculeneuf, idfacture, immatriculation, type_vehicule, modele, millesime, cylindree, energie,
         type_boite, prix, date_immat, img) VALUES 
        (null, null, :immatriculation, :type_vehicule, :modele, :millesime, :cylindree, :energie, :type_boite, :prix, :date_immat, :img)
        ";

        $insert = $this->unPdo->prepare($requete);
        $insert->execute(array(
            ":immatriculation"=>$immatriculation,
            ":type_vehicule"=>$type,
            ":modele"=>$modele,
            ":millesime"=>$millesime,
            ":cylindree"=>$cylindree,
            ":energie"=>$energie,
            ":type_boite"=>$typeBoite,
            ":prix"=>$prix,
            ":date_immat"=>$date_imma,
            ":img"=>$url_img,

        ));
    }

    public function addVehiculeOccas($immatriculation, $type, $modele, $millesime, $cylindree
    ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img) {
        $requete = "INSERT INTO vehicule_occasion
        (idvehiculeocc, idclient, idtechnicien, idfacture, immatriculation, type_vehicule,
        modele, millesime, kilometrage, cylindree, energie, type_boite, prix, date_immat,
        descriptif, valide, img) VALUES 
        (null, null, null, null, :immatriculation, :type_vehicule, :modele, :millesime, :kilometrage,
        :cylindree, :energie, :type_boite, :prix, :date_immat, :descriptif, :valide, :img)";

        $insert = $this->unPdo->prepare($requete);
        $insert->execute(array(
            ":immatriculation"=>$immatriculation,
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
        ));
    }

    public function addVehiculeClient($user, $immatriculation, $type, $modele, $millesime, $cylindree
    ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img) {
         $selectid = $this->unPdo->prepare("select iduser from utilisateur where pseudo = ?");
        $selectid->execute(array($user));
        $idUser = $selectid->fetch();

        $requete = "INSERT INTO vehicule_client
        (idvehiculeclient, iduser, immatriculation, type_vehicule, modele, millesime,
        kilometrage, cylindree, energie, type_boite, prix, date_immat, descriptif, valide, img,
        date_rdv, heure_rdv, type_rdv) 
        VALUES (null, :user, :immatriculation, :type_vehicule, :modele, :millesime, :kilometrage,
        :cylindree, :energie, :type_boite, :prix, :date_immat, :descriptif, :valide, :img,
        null, null, null)";

        $insert = $this->unPdo->prepare($requete);
        $insert->execute(array(
            ":user"=>intval($idUser['iduser']),
            ":immatriculation"=>$immatriculation,
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
        ));
    }


    //Modification vehicule

    public function selectVehicule($immatriculation) {
		$requete1 = "Select * from vehicule_neuf where immatriculation = :immatriculation";
		$requete2 = "Select * from vehicule_occasion where immatriculation = :immatriculation";
		$requete3 = "Select * from vehicule_client where immatriculation = :immatriculation";


		$select = $this->unPdo->prepare($requete1);
        $select->execute(array("immatriculation"=>$immatriculation));
        $type = "neuf";
        $resultat = $select->fetch();
        $array = array(
            "type"=>$type,
            "resultat"=>$resultat,
        );

		if ($resultat == null) {
			$select2 = $this->unPdo->prepare($requete2);
			$select2->execute(array("immatriculation"=>$immatriculation));
            $type2 = "occasion";
            $resultat2 = $select2->fetch();
            $array2 = array(
                "type"=>$type2,
                "resultat"=>$resultat2,
            );

			if ($resultat2 == null) {
				$select3 = $this->unPdo->prepare($requete3);
				$select3->execute(array("immatriculation"=>$immatriculation));
                $type3 = "client";
                $resultat3 = $select3->fetch();
                $array3 = array(
                    "type"=>$type3,
                    "resultat"=>$resultat3,
                );
				return $array3;
			}
			return $array2;
        }
		return $array;
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
}
    
?>