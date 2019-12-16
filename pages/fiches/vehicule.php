
<?php
	require '../../includes/header.php';
	$result = [];
	$controleur = new Controleur ('localhost', 'bmwv2', 'root', '');
	if (isset($_GET['immat'])) {
		$immat = htmlspecialchars($_GET['immat']);
		$result = $controleur->selectVehicule($immat);
	}
	
	if (!empty($result)) {
		$data = $result['data'];
		if ($result['type'] == 'neuf') require 'vue/vue_fiche_veh_neuf.php';
		if ($result['type'] == 'occas') require 'vue/vue_fiche_veh_occas.php';
	} else {
		echo 'Vehicule introuvable';
	}
	require '../../includes/footer.php';
?>