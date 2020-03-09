
<?php
	$result = [];
	if (isset($_GET['immat'])) {
		$immat = htmlspecialchars($_GET['immat']);
		$result = $this->selectVehicule($immat);
	}
	
	if (!empty($result)) {
		$data = $result['data'];
		if ($result['type'] == 'neuf') require VIEW.'pages/fiches/vue/vue_fiche_veh_neuf.php';
		if ($result['type'] == 'occas') require VIEW.'pages/fiches/vue/vue_fiche_veh_occas.php';
	} else {
		echo 'Vehicule introuvable';
	}
?>