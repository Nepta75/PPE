<?php
session_start();
require_once ("controleur/controleur.php");
$unControler = new Controleur("localhost", "bmwppe", "root", "");
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


	<!-- FAVICON -->

	<link rel="shortcut icon" type="image/ico" href="img/icons/favicon.ico" />

	</head>

	<!-- Contenu du site -->

	<body>

	<!-- Header -->

	<div>
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
						<li class="menu-vehicules"> <a href="#"> Véhicules </a>
							<ul class="submenu">
								<li><a href="#"> Véhicules d'occasion </a></li>
								<li><a href="#"> Véhicules neufs </a></li>								
							</ul>
						</li>
						<li class="menu-devisfactures"> <a href="#"> Devis & Factures </a>
						</li>
						<li class="menu-apropos"> <a href="propos.php"> À Propos </a>
						</li>
						<li class="menu-contact"> <a href="contact.php"> Contact </a>
						</li>
					<?php
						if ($admin != null) {
							echo '<a href="deconnexion.php"> Se déconnecter </a>';
						} else {
							echo '<a href="gestionclient.php" id="connexionmenu"> Se connecter</a>';
						}
					?>
						<li class="monvehicule"> <a href="#"> Mon véhicule </a>
						</li>
					</ul>
				</nav>
			</div>
		</header>	
	</div>
	<img src="img/logo2.png" class="logo" width="110"/>
