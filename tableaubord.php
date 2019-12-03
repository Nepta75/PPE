<?php
require 'controleur/controleur.php';
$controleur = new Controleur ("localhost", "bmwppe", "root", "");
$cAdmin = new Administrateur("localhost", "bmwppe", "root", "");
$admin = $cAdmin->verifAdmin();
?>

<div>
	<div class="vehicule_page" id=vehiculeneuf>
	    <?php
	    $vehiculesNeuf = $controleur->selectAllVehiculesNeuf();
		$vehiculesOccasion = $controleur->selectAllVehiculesOccasionDispo();
	    	require ('vue/vue_vehicule_occasion.php');
	    ?>
	</div>

	<div>
		<?php
			$data = $cAdmin->selectAllEssai();
			require ('vue/vue_list_resa.php');
		?>
	</div>
		<?php
			$data = $cAdmin->selectAllClients();
			require ('vue/vue_lists/vue_list_clients.php');
		?>
	<div>

	<button id="boutonadmin"> <a href="admin.php?page=1"> Administrer </a></button>
	
</div>


<?php
include 'includes/footer.php';
?>