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
	

	<link rel="stylesheet" type="text/css" href="<?= CSS ?>bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= CSS ?>style.css"/>
	<link href="<?= CSS ?>fontawesome/css/all.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= CSS ?>header.css"/>
	<link rel="stylesheet" type="text/css" href="<?= CSS ?>footer.css"/>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- FAVICON -->

	<link rel="shortcut icon" type="image/ico" href="<?= IMG ?>icons/favicon.ico" />

	</head>
	<body>

	<!-- Header -->

	<div class="header">
		<div class="logo">
			<a href="home"><img src="<?= IMG ?>logo2.png"></a>
			<a href="home"><h4>BMW Paris<br/>Automobiles & Moto</h4></a>
		</div>
        <nav class="navbar">
          <ul class="menu">
            <li class="menu-button"><a href="home" class="menu-link">Accueil</a></li>
            <li class="menu-button deroulant">
              <a href="vehicule" class="deroulant-link"> Véhicules <i class="fas fa-caret-down"></i></a>
              <ul class="submenu">
                <li class="submenu-button"><a href="vehicule?type=occas" class="submenu-link">Véhicules d'occasion</a></li>
                <li class="submenu-button"><a href="vehicule?type=neuf" class="submenu-link">Véhicules neufs</a></li>
              </ul>
            </li>
            <li class="menu-button"><a href="propos" class="menu-link">À Propos</a></li>
            <li class="menu-button"><a href="contact" class="menu-link">Contact</a></li>
		  <?php if(isset($_SESSION['admin_lvl']) && $_SESSION['admin_lvl'] > 0) { ?>
		  	<li class="menu-button deroulant"> <a href="admin" class="deroulant-link">Admin <i class="fas fa-caret-down"></i></a>
				<ul class="admin-submenu">
					<li><a href="admin?page=1" class="admin-submenu-link" id="page1">Ajouter un Véhicule</a></li>
					<li><a href="admin?page=2" class="admin-submenu-link">Modifier un Véhicule</a></li>
					<li><a href="admin?page=3" class="admin-submenu-link">Générer un devis</a></li>
					<li><a href="admin?page=4" class="admin-submenu-link">Liste des devis</a></li>
					<li><a href="admin?page=5" class="admin-submenu-link">Liste des véhicules</a></li>
					<li><a href="admin?page=6" class="admin-submenu-link">Liste des clients</a></li>
					<li><a href="admin?page=7" class="admin-submenu-link">Liste demandes d'essai</a></li>				
				</ul>
			</li>
			<?php } ?>
			<?php if (!$admin && isset($_SESSION['pseudo'])) { ?>
				<li class="monvehicule" class="menu-button menu-monvehicule"><a href="monvehicule.php" class="menu-link">Mon véhicule</a></li>
			<?php } ?>
			<?php
			if (isset($_SESSION['email'])) {
				echo '<li class="connexion-button"><a href="deconnexion" class="connexion-link">Se déconnecter</a></li>';
			} else {
				echo '<li class="connexion-button"><a href="connexion" class="connexion-link">Se connecter</a></li>';
			}
			?>
			</ul>
        </nav>
	</div>
