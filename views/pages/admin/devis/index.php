<?php
$clients = $this->selectAllClients();
$vehiculesNeufs = $this->selectAllVehiculesNeuf();
$vehiculesOccasions = $this->selectAllVehiculesOccasion();
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
			$infoVehicule = $this->selectVehicule($_POST['vehicule']);

			$user = $this->selectClient(htmlspecialchars($_POST['id_user']));
			$dataDevis = 
				array (
					"sujet"=>$_POST['sujet'],
					"immatriculation"=>$_POST['vehicule'],
					"nom"=>$user['nom'],
					"prenom"=>$user['prenom'],
					"mail"=>$user['mail'],
					"adresse"=>$user['adresse'],
					"info"=> '',
					"prix"=> $infoVehicule['data']['prix'],
					"id_client"=> intval($_POST['id_user']),
					"id_technicien"=> intval($_SESSION['id_user']),
					"statut"=> 'en attente',
				);
			$this->insertDevis($dataDevis);
		} else {
			$value = 1;
			$data = ['user'=>$_POST['id_user'], 'sujet'=>$_POST['sujet']];
			$erreur = "Veuillez choisir un vehicule pour le devis !";
		}
	}
}


if(isset($erreur)){ echo "<div class='error-message'>".$erreur."</div>";}
switch ($value) {
	case 0: require VIEW.'pages/admin/devis/devis_part1.php'; break;
	case 1: 
		$user = $this->selectClient($data['user']);
		require VIEW.'pages/admin/devis/devis_part2.php'; break;
	default: require VIEW.'pages/admin/devis/devis_part1.php'; break;
}
?>