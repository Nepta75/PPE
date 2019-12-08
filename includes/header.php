<?php
session_start();
require_once ("controleur/controleur_admin.php");
require_once 'includes/identifiants_bdd.php';
$unControler = new Administrateur($env, $database, $user, $mdp);
$admin = $unControler->verifAdmin();

/* // Program to display URL of current page. 
  
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
else
    $link = "http"; 
  
// Here append the common URL characters. 
$link .= "://"; 
  
// Append the host(domain name, ip) to the URL. 
$link .= $_SERVER['HTTP_HOST']; 
  
// Append the requested resource location to the URL 
$link .= $_SERVER['REQUEST_URI']; 
      
// Print the link 
echo $link; */
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
	<link rel="stylesheet" type="text/css" href="css/header.css"/>
	<link rel="stylesheet" type="text/css" href="css/footer.css"/>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- FAVICON -->

	<link rel="shortcut icon" type="image/ico" href="img/icons/favicon.ico" />

	</head>
	<body>

	<!-- Header -->

	<div class="header">
		<div class="logo">
			<a href="index.php"><img src="img/logo2.png"></a>
			<a href="index.php"><h4>BMW Paris<br/>Automobiles & Moto</h4></a>
		</div>
        <nav class="navbar">
          <ul class="menu">
            <li class="menu-button"><a href="index.php" class="menu-link">Accueil</a></li>
            <li class="menu-button deroulant">
              <a href="gestionvehicules.php" class="deroulant-link"> Véhicules <i class="fas fa-caret-down"></i></a>
              <ul class="submenu">
                <li class="submenu-button"><a href="gestionvehicules.php?#vehiculeoccasion" class="submenu-link">Véhicules d'occasion</a></li>
                <li class="submenu-button"><a href="gestionvehicules.php?#vehiculeneuf" class="submenu-link">Véhicules neufs</a></li>
              </ul>
            </li>
            <li class="menu-button"><a href="propos.php" class="menu-link">À Propos</a></li>
            <li class="menu-button"><a href="contact.php" class="menu-link">Contact</a></li>
		  <?php if(isset($_SESSION['admin_lvl']) && $_SESSION['admin_lvl'] > 0) { ?>
		  	<li class="menu-button deroulant"> <a href="admin.php" class="deroulant-link">Admin <i class="fas fa-caret-down"></i></a>
				<ul class="admin-submenu">
					<li><a href="admin.php?page=1" class="admin-submenu-link" id="page1">Ajouter un Véhicule</a></li>
					<li><a href="admin.php?page=2" class="admin-submenu-link">Modifier un Véhicule</a></li>
					<li><a href="admin.php?page=3" class="admin-submenu-link">Générer un devis</a></li>
					<li><a href="admin.php?page=4" class="admin-submenu-link">Liste des devis</a></li>
					<li><a href="admin.php?page=5" class="admin-submenu-link">Liste des véhicules</a></li>
					<li><a href="admin.php?page=6" class="admin-submenu-link">Liste des clients</a></li>
					<li><a href="admin.php?page=7" class="admin-submenu-link">Liste des réservations</a></li>				
				</ul>
			</li>
			<?php } ?>
			<?php if (!$admin && isset($_SESSION['pseudo'])) { ?>
				<li class="monvehicule" class="menu-button menu-monvehicule"><a href="monvehicule.php" class="menu-link">Mon véhicule</a></li>
			<?php } ?>
			<?php
			if (isset($_SESSION['pseudo'])) {
				echo '<li class="connexion-button"><a href="deconnexion.php" class="connexion-link">Se déconnecter</a></li>';
			} else {
				echo '<li class="connexion-button"><a href="gestionclient.php" class="connexion-link">Se connecter</a></li>';
			}
			?>
			</ul>
        </nav>
	</div>
