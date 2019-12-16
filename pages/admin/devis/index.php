<?php
require_once '../../includes/header.php';
$unControleur = new Controleur('localhost', 'bmwv2', 'root', '');
$clients = $unControleur->selectAllClients();
$vehiculesNeufs = $unControleur->selectAllVehiculesNeuf();
$vehiculesOccasions = $unControleur->selectAllVehiculesOccasion();
$value = 0;
$data = [];

if (isset($_POST['valide1'])) {
	if (!empty($_POST['user']) && !empty($_POST['subject'])) {
		$value = 1;
		$data = ['user'=>$_POST['user'], 'sujet'=>$_POST['subject']];
	} else {
		$erreur = 'Veuillez sélectionner un sujet et un utilisateur !';
	}
} else {
	if (isset($_POST['valid2'])) {
		if (!empty($_POST['vehicule'])) {
			$infoVehicule = $unControleur->selectVehicule($_POST['vehicule']);

			$user = $unControleur->selectClient(htmlspecialchars($_POST['id_user']));
			$dataDevis = 
				array (
					"sujet"=>$_POST['sujet'],
					"immatriculation"=>$_POST['vehicule'],
					"nom"=>$user['nom'],
					"prenom"=>$user['prenom'],
					"mail"=>$user['mail'],
					"adresse"=>$user['adresse'],
					"info"=> '',
					"prix"=> 0,
					"id_client"=> intval($_POST['id_user']),
					"id_technicien"=> intval($_SESSION['id_user']),
				);
			$unControleur->insertDevis($dataDevis);
		} else {
			$value = 1;
			$data = ['user'=>$_POST['id_user'], 'sujet'=>$_POST['sujet']];
			$erreur = "Veuillez choisir un vehicule pour le devis !";
		}
	}
}


if(isset($erreur)){ echo "<div class='error-message'>".$erreur."</div>";}
switch ($value) {
	case 0: require 'devis_part1.php'; break;
	case 1: 
		$user = $unControleur->selectClient($data['user']);
		require 'devis_part2.php'; break;
	default: require 'devis_part1.php'; break;
}

require_once '../../includes/footer.php';
?>