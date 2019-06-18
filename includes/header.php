<?php
session_start();
require_once ("controleur/controleur_admin.php");
$unControler = new Administrateur("localhost", "bmwppe", "root", "");
$admin = $unControler->verifAdmin();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			Concession INSTA BMW
		</title>

	<!-- FONT -->

	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

	<!-- CSS -->
	

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link href="css/fontawesome/css/all.css" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- FAVICON -->

	<link rel="shortcut icon" type="image/ico" href="img/icons/favicon.ico" />

	</head>

	<!-- Contenu du site -->

	<body>

	<!-- Header -->

	<div id="header_menu">
		<div class="header1">
		</div>
		<div class="header2">	
		</div>
		<header class="container-fluid header">
			<div class="container_header">
				<nav class="menu">
					<ul>
						<li class="menu-accueil"> <a href="index.php"> Accueil </a>
						</li>
						<li class="menu-vehicules"> <a href="gestionvehicules.php"> Véhicules <i class="fas fa-caret-down"></i></a>
							<ul class="submenu">
								<li><a href="gestionvehicules.php?#vehiculeoccasion"> Véhicules d'occasion </a></li>
								<li><a href="gestionvehicules.php?#vehiculeneuf"> Véhicules neufs </a></li>								
							</ul>
						</li>
						<li class="menu-apropos"> <a href="propos.php"> À Propos </a>
						</li>
						<li class="menu-contact"> <a href="contact.php"> Contact </a>
						</li>
						<?php if(isset($_SESSION['admin_lvl']) && $_SESSION['admin_lvl'] > 0) { ?>
							<li class="menu-admin"> <a href="admin.php"> Admin <i class="fas fa-caret-down"></i></a>
								<ul class="submenu">
									<li><a href="admin.php?page=1" id="page1">Ajouter un Véhicule</a></li>
									<li><a href="admin.php?page=2">Modifier un Véhicule</a></li>
									<li><a href="admin.php?page=3">Devis</a></li>
									<li><a href="admin.php?page=4">vehicules Dispos</a></li>
									<li><a href="admin.php?page=5">vehicules Indispo</a></li>	
									<li><a href="admin.php?page=6">Liste des clients</a></li>
									<li><a href="admin.php?page=7">Liste des réservations</a></li>				
								</ul>
							</li>
						<?php } ?>
					<?php
						if (isset($_SESSION['pseudo'])) {
							echo '<a href="deconnexion.php" class="connexionmenu"> Se déconnecter </a>';
						} else {
							echo '<a href="gestionclient.php" class="connexionmenu"> Se connecter</a>';
						}
					?>
					<?php if (!$admin && isset($_SESSION['pseudo'])) { ?>
						<li class="monvehicule"> <a href="#"> Mon véhicule </a>
						</li>
					<?php } ?>
					</ul>
				</nav>
			</div>
		</header>	
	</div>
	<img src="img/logo2.png" id="logo" class="logo" width="110"/>
