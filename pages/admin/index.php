<?php
include '../../includes/header.php';
$cAdmin = new Administrateur("localhost", "bmwv2", "root", "");
$admin = $cAdmin->verifAdmin();
if ($admin == null) {
   $error = "Erreur - 404. Page introuvable";
} else {
        if(isset($_GET['page']) && $_GET['page'] == "6" && isset($_GET['action']) && $_GET['action'] == 'x' && isset($_GET['iduser']) && !empty($_GET['iduser'])) {
            $cAdmin->deleteUser($_GET['iduser']);
        }

        if(isset($_GET['page']) && $_GET['page'] == "7" && isset($_GET['action']) && $_GET['action'] == 'c' && isset($_GET['iduser']) && !empty($_GET['iduser']) && !empty($_GET['immat']) && isset($_GET['date']) && isset($_GET['heure'])) {
            $date = $_GET['date'];
            $heure = $_GET['heure'];
            echo $heure;
            $dataVehicule = $cAdmin->selectVehicule($_GET['immat']);
            require_once ("controleur/controleur.php");
            $unControleur = new Controleur($env, $database, $user, $mdp);
            $user = $unControler->selectUser($_GET['iduser']);
            $cAdmin->confirmEssai($_GET['idessayer']);
            $mail = $user['email'];
            $nom = $user['nom'];
            $prenom = $user['prenom'];
            require 'controleur/controleur_mail.php';
            $cMail = new Mail ($env, $database, $user, $mdp);

            $cMail->mail_resa_confirm_status($mail, $nom, $prenom, $dataVehicule['resultat'], $date, $heure);
        }

        if(isset($_GET['page']) && $_GET['page'] == "7" && isset($_GET['action']) && $_GET['action'] == 'x' && isset($_GET['idessayer']) && !empty($_GET['idessayer'])) {
            $cAdmin->deleteEssayer($_GET['idessayer']);
        }


        if(isset($_POST['update_client'])) {
            if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse_rue']) && !empty($_POST['adresse_cp'])
            && !empty($_POST['ville']) && !empty($_POST['tel']) && !empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['mdp']) && !empty($_POST['admin_lvl'])) {
                $unControler->updateInscription($_POST, $_GET['iduser']);
                $succes = $_POST['nom']." ".$_POST['prenom']." Alias ".$_POST['pseudo']." Vien d'être mis à jour !";
            } else {
                $erreur = "Erreur Veuillez remplire tous les champs !";
            }
        }

        if(isset($_POST['annuler'])) {
            header("Location:/ppe/pages/admin/index.php");
        }
}
?>

<?php

if(isset($error)) {
    echo "<div class='error-message center'>".$error."</div>";
    echo "<a href='index.php'>Retour à l'accueil</a>";
    return;
} else if(isset($succes)) {
    echo "<div class='succes-message center'>".$succes."</div>";
} else if(isset($erreur)) {
    echo "<div class='error-message center'>".$erreur."</div>";
}

$page = 0;
if (isset($_GET['page'])) { $page = $_GET['page']; }
switch($page) {
    case 1 : require "vehicules/vehicule_add.php"; break;
    case 2 : require "vehicules/vehicule_update.php"; break;
    case 3 : require "devis/index.php"; break;
    case 4 : require "lists/list_devis/index.php"; break;
    case 5 : require "lists/list_vehicules/index.php"; break;
    case 6 : require "lists/list_users/index.php"; break;
    case 7 : require "lists/list_essai/index.php"; break;
    default : ?>
<div class="admin-container">
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-users"></i></div>
        <p>Clients</p>
        <div><?= $cAdmin->countFromTable('view_client'); ?></div>
        <a href="index.php?page=6&select=client">voir</a>
    </div>
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-car"></i></div>
        <p>Vehicules Neufs</p>
        <div><?= $cAdmin->countFromTable('view_veh_neuf'); ?></div>
        <a href="index.php?page=5&select=neuf">voir</a>
    </div>
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-car-crash"></i></div>
        <p>Vehicules Occasions</p>
        <div><?= $cAdmin->countFromTable('view_veh_occas'); ?></div>
        <a href="index.php?page=5&select=occas">voir</a>
    </div>
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-car-side"></i></div>
        <p>Vehicules Clients</p>
        <div><?= $cAdmin->countFromTable('view_veh_client'); ?></div>
        <a href="index.php?page=5&select=client">voir</a>
    </div>
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-sticky-note"></i></div>
        <p>Devis</p>
        <div><?= $cAdmin->countFromTable('view_devis'); ?></div>
        <a href="index.php?page=4">voir</a>
    </div>
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-comments"></i></div>
        <p>Demandes d'essayages</p>
        <div><?= $cAdmin->countFromTable('view_essayer'); ?></div>
        <a href="index.php?page=7">voir</a>
    </div>
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-tools"></i></div>
        <p>Techniciens</p>
        <div><?= $cAdmin->countFromTable('view_technicien'); ?></div>
        <a href="index.php?page=6&select=technicien">voir</a>
    </div>
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-users-cog"></i></div>
        <p>Administrateurs</p>
        <div><?= $cAdmin->countFromTable('view_admin'); ?></div>
        <a href="index.php?page=6&select=admin">voir</a>
    </div>
</div>
    <?php
}
?>



<?php
require_once '../../includes/footer.php';
?>