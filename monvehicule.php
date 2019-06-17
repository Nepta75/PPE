<?php
	require_once 'includes/header.php';
	if(isset($_SESSION['pseudo']))
	{
		require_once("controleur/controleur.php");
		$unControleur = new Controleur("localhost", "bmwppe", "root", "");
        $resultats = $unControleur->selectVehiculeClient($_SESSION['id_user']);
        $users = $unControleur->selectAllUsers();

        $resultats = $unControleur->selectVehiculeClient($_SESSION['id_user']);
        require_once("vue/vue_mon_vehicule.php");
        var_dump($_SESSION)
?>





<?php

}

require_once 'includes/footer.php';

?>