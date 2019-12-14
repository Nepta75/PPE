<?php
	require_once 'includes/header.php';
	if(isset($_SESSION['pseudo']))
	{
		require_once("controleur/controleur.php");
		require_once 'includes/identifiants_bdd.php';
		$unControleur = new Controleur($env, $database, $user, $mdp);
        $users = $unControleur->selectAllUsers();

        $resultat = $unControleur->selectVehiculeClient($_SESSION['id_user']);
        require_once("vue/vue_mon_vehicule.php");
?>





<?php

}

require_once 'includes/footer.php';

?>