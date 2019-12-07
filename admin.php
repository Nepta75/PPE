<?php
require_once 'includes/header.php';
require_once 'controleur/controleur_admin.php';
$cAdmin = new Administrateur("localhost", "bmwv2", "root", "");
$admin = $cAdmin->verifAdmin();
if ($admin == null) {
   $error = "Erreur - 404. Page introuvable";
} else {
    if(isset($_POST['add_vehicule_neuf'])) {
        $cAdmin->addVehiculeNeuf($_POST);
    }
    if(isset($_POST['add_vehicule_occasion'])) {
        $cAdmin->addVehiculeOccas($_POST);
    }
    if(isset($_POST['add_vehicule_client'])) {
        $cAdmin->addVehiculeClient($_POST);
    }

    //Update vehicule neuf

    if (isset($_POST['update_vehicule_neuf'])) {
        $immatriculation = htmlspecialchars($_POST['immatriculation']);
        $type = $_POST['type'];
        $modele = htmlspecialchars($_POST['modele']);
        $millesime = intval($_POST['millesime']);
        $cylindree = intval($_POST['cylindree']);
        $energie = $_POST['energie'];
        $typeBoite = $_POST['typeBoite'];
        $prix = floatval($_POST['prix']);
        $date_imma = $_POST['dateImma'];
        $url_img = $_POST['img_vehicule'];

        if(!empty($immatriculation) && !empty($type) && !empty($modele) && !empty($millesime)
        && !empty($cylindree) && !empty($energie) && !empty($typeBoite) && !empty($prix) && 
        !empty($date_imma) && !empty($url_img)) {
            $cAdmin->updateVehiculeNeuf($immatriculation, $type, $modele, $millesime, $cylindree
            ,$energie, $typeBoite, $prix, $date_imma, $url_img);
            $succes = "Succès : Vous venez de mettre a jour le Véhicule neuf d'immatriculation : ".$immatriculation." !";
        } else {
            $erreur = "Veuillez remplir tous les champs !";
        }
    }

    //Update vehicule occasion

    if (isset($_POST['update_vehicule_occasion'])) {
        $immatriculation = htmlspecialchars($_POST['immatriculation']);
        $type = $_POST['type'];
        $modele = htmlspecialchars($_POST['modele']);
        $millesime = intval($_POST['millesime']);
        $cylindree = intval($_POST['cylindree']);
        $energie = $_POST['energie'];
        $typeBoite = $_POST['typeBoite'];
        $km = intval($_POST['km']);
        $descriptif = $_POST['descriptif'];
        $valid = $_POST['valide_vehicule'];
        $prix = floatval($_POST['prix']);
        $date_imma = $_POST['dateImma'];
        $url_img = $_POST['img_vehicule'];

        if(!empty($immatriculation) && !empty($type) && !empty($modele) && !empty($millesime)
        && !empty($cylindree) && !empty($energie) && !empty($typeBoite) && !empty($prix) && 
        !empty($date_imma) && !empty($url_img)) {
            $cAdmin->updateVehiculeOccas($immatriculation, $type, $modele, $millesime, $cylindree
            ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img);
            $succes = "Succès : Vous venez de mettre a jour le Véhicule d'occasion d'immatriculation : ".$immatriculation." !";
        } else {
            $erreur = "Veuillez remplir tous les champs !";
        }
    }

        // Update vehicule client
        if(isset($_POST['update_vehicule_client'])) {
            $user = htmlspecialchars($_POST['user']);
            $immatriculation = htmlspecialchars($_POST['immatriculation']);
            $type = $_POST['type'];
            $modele = htmlspecialchars($_POST['modele']);
            $millesime = intval($_POST['millesime']);
            $cylindree = intval($_POST['cylindree']);
            $energie = $_POST['energie'];
            $typeBoite = $_POST['typeBoite'];
            $km = intval($_POST['km']);
            $descriptif = $_POST['descriptif'];
            $valid = $_POST['valide_vehicule'];
            $prix = floatval($_POST['prix']);
            $date_imma = $_POST['dateImma'];
            $url_img = $_POST['img_vehicule'];
    
            if(!empty($user) && !empty($immatriculation) && !empty($type) && !empty($modele) && !empty($millesime)
            && !empty($cylindree) && !empty($energie) && !empty($typeBoite) && !empty($prix) && 
            !empty($date_imma) && !empty($url_img)) {
                $cAdmin->updateVehiculeClient($user, $immatriculation, $type, $modele, $millesime, $cylindree
                ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img);
                $succes = "Succès : Vous venez de modifier le vehicule d'immatriculation ".$immatriculation." !";
            } else {
                $erreur = "Veuillez remplir tous les champs !";
            }
        }

        if (isset($_POST['supp_vehicule_neuf'])) {
            $cAdmin->deleteVehiculeNeuf($_POST['immatriculation']);
            $succes = "Succes : Vous venez de supprimer le vehicule neuf d'immatriculation : ".$_POST['immatriculation']." ! ";
        }

        if (isset($_POST['supp_vehicule_occasion'])) {
            $cAdmin->deleteVehiculeOccasion($_POST['immatriculation']);
            $succes = "Succes : Vous venez de supprimer le vehicule d'occasion d'immatriculation : ".$_POST['immatriculation']." ! ";
        }

        if (isset($_POST['supp_vehicule_client'])) {
            $cAdmin->deleteVehiculeClient($_POST['immatriculation']);
            $succes = "Succes : Vous venez de supprimer un Vehicule client d'immatriculation : ".$_POST['immatriculation']." ! ";
        }

        if(isset($_POST['immat'])) {
            if(empty($_POST['immatriculation'])) {
                $erreur = "Veuillez saisir une immatriculation !";
            }
        }

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
            header("Location:admin.php");
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
    case 1 : require "vue/vue_ajouter_vehicule.php"; break;
    case 2 : $cAdmin->updateVehicule($_POST); break;
    case 3 : require "gestiondevis.php"; break;
    case 4 : header("Location:gestionvehicules.php"); break;
    case 5 :
    $data = $cAdmin->selectAllClients();
    if(isset($_GET['action']) && $_GET['action'] == 'm' && isset($_GET['iduser']) && !empty($_GET['iduser'])) {
        $user = $cAdmin->selectUser($_GET['iduser']);
        require "vue/vue_update_client.php";
    } require "pages/admin/lists/list.php"; break;
    case 6 :
    $data = $cAdmin->selectAllEssai();
    echo "<h3 style='text-align: center; margin-top: 100px;'>List des demandes d'essais</h3>";
    require 'vue/vue_list_resa.php'; break;
    default : require "pages/admin/index.php";
}
?>



<?php
require_once 'includes/footer.php';
?>