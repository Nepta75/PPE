<?php
require_once 'includes/header.php';
require_once ("controleur/controleur_admin.php");
$cAdmin = new Administrateur("localhost", "bmwppe", "root", "");
$admin = $cAdmin->verifAdmin();
if ($admin == null) {
   $error = "Erreur - 404. Page introuvable";
} else {
    // AJOUT VEHICULE NEUF
    if(isset($_POST['add_vehicule_neuf'])) {
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
            $cAdmin->addVehiculeNeuf($immatriculation, $type, $modele, $millesime, $cylindree
            ,$energie, $typeBoite, $prix, $date_imma, $url_img);
            $succes = "Succès : Vous venez d'ajoutez un nouveau Véhicule neuf !";
        } else {
            $erreur = "Veuillez remplire tous les champs !";
        }
    }

     // AJOUT VEHICULE OCCASION
    if(isset($_POST['add_vehicule_occasion'])) {
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
            $cAdmin->addVehiculeOccas($immatriculation, $type, $modele, $millesime, $cylindree
            ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img);
            $succes = "Succès : Vous venez d'ajoutez un nouveau Véhicule d'occasion !";
        } else {
            $erreur = "Veuillez remplire tous les champs !";
        }
    }

    // AJOUT VEHICULE ClIENT
    if(isset($_POST['add_vehicule_client'])) {
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
            $cAdmin->addVehiculeClient($user, $immatriculation, $type, $modele, $millesime, $cylindree
            ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img);
            $succes = "Succès : Vous venez d'ajoutez un nouveau Véhicule pour ".$user." !";
        } else {
            $erreur = "Veuillez remplire tous les champs !";
        }
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
            $erreur = "Veuillez remplire tous les champs !";
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
            $erreur = "Veuillez remplire tous les champs !";
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
                $erreur = "Veuillez remplire tous les champs !";
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
}
?>

<?php

if(isset($error)) {
    echo "<div class='error-message center'>".$error."</div>";
    echo "<a href='index.php'>Retour à l'accueil</a>";
    return;
} else if(isset($succes)) {
    echo "<div class='succes-message center'>".$succes."</div>";
}

$page = 0;
if (isset($_GET['page'])) { $page = $_GET['page']; }
switch($page) {
    case 1 :  require "vue/vue_ajouter_vehicule.php"; break;
    case 2 : 
        $erreur = $cAdmin->verifVehicule($_POST);
        $resultat = $cAdmin->selectVehicule($_POST);
        if (isset($erreur)) {
            require "vue/vue_modifier_vehicule.php"; 
        } else {
            require "vue/vue_modifier_vehicule.php"; 
            if(isset($_POST['type_modif'])) {
                if($_POST['type_modif'] == "neuf") {
                    require "vue/vue_modifier_vehicule_neuf.php";
                } elseif($_POST['type_modif'] == "occasion") {
                    require "vue/vue_modifier_vehicule_occas.php";
                } elseif ($_POST['type_modif'] == "client") {
                    require_once ("controleur/controleur.php");
                    $unControleur = new Controleur("localhost", "bmwppe", "root", "");
                    $dataVehicule = $unControleur->selectVehiculeClient($resultat['iduser']);
                    $users = $unControleur->selectAllUsers();
                    require "vue/vue_modifier_vehicule_client.php";
                }
            }
        }
    break;
    case 3 : require "gestiondevis.php"; break;
    case 4 : require "vue/vue_ajouter_vehicule.php"; break;
    case 5 : require "vue/vue_ajouter_vehicule.php"; break;
    default : require "vue/vue_ajouter_vehicule.php";
}
?>


<?php
require_once 'includes/footer.php';
?>