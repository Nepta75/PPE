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
            $succes = "Succès : Vous venez d'ajouter un nouveau Véhicule neuf !";
        } else {
            $erreur = "Veuillez remplir tous les champs !";
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
            $succes = "Succès : Vous venez d'ajouter un nouveau Véhicule d'occasion !";
        } else {
            $erreur = "Veuillez remplir tous les champs !";
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
            $succes = "Succès : Vous venez d'ajouter un nouveau Véhicule pour ".$user." !";
        } else {
            $erreur = "Veuillez remplir tous les champs !";
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
            $unControleur = new Controleur("localhost", "bmwppe", "root", "");
            $user = $unControler->selectUser($_GET['iduser']);
            var_dump($user);
            $cAdmin->confirmEssai($_GET['idessayer']);
            $mail = $user['email'];
            $nom = $user['nom'];
            $prenom = $user['prenom'];
            require 'controleur/controleur_mail.php';
            $cMail = new Mail ("localhost", "bmwppe", "root", "");

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
    case 1 :  require "vue/vue_ajouter_vehicule.php"; break;
    case 2 : 
        if (isset($_GET['type']) && isset($_GET['immat']) && !empty($_GET['type']) && !empty($_GET['immat']) && !isset($succes) && !isset($_POST['immat'])){
            $tab = array(
                "immatriculation"=>$_GET['immat'],
                "type_modif"=>$_GET['type'],
            );
            $erreur = $cAdmin->verifVehicule($tab);
            $resultat1 = $cAdmin->selectVehicule($tab['immatriculation']);
            echo $resultat1['type'];
            $resultat = $resultat1['resultat'];
            if($resultat1['type'] == "neuf") {
                echo "<h3 style='margin-top: 100px; text-align:center'>Modification d'un vehicule neuf</h3>";
                require "vue/vue_modifier_vehicule_neuf.php";
            } else if ($resultat1['type'] == "occasion") {
                echo "<h3 style='margin-top: 100px; text-align:center'>Modification d'un vehicule d'occasion</h3>";
                require "vue/vue_modifier_vehicule_occas.php";
            }
        } else {
            if (!isset($_POST['immat'])) {
                require "vue/vue_modifier_vehicule.php"; 
            }
            if(isset($_POST['immat'])) {
                if(!empty($_POST['immatriculation'])) {
                    $erreur = $cAdmin->verifVehicule($_POST);
                    $resultat1 = $cAdmin->selectVehicule($_POST['immatriculation']);
                    $resultat = $resultat1['resultat'];
                    if($resultat1['type'] == "neuf") {
                        echo "<h3 style='margin-top: 100px; text-align:center'>Modification d'un vehicule neuf</h3>";
                        require "vue/vue_modifier_vehicule_neuf.php";
                    } elseif($resultat1['type'] == "occasion") {
                        echo "<h3 style='margin-top: 100px; text-align:center'>Modification d'un vehicule d'occasion</h3>";
                        require "vue/vue_modifier_vehicule_occas.php";
                    } elseif ($resultat1['type'] == "client") {
                        echo "<h3 style='margin-top: 100px; text-align:center'>Modification d'un vehicule Client</h3>";
                        require_once ("controleur/controleur.php");
                        $unControleur = new Controleur("localhost", "bmwppe", "root", "");
                        $dataVehicule = $unControleur->selectVehiculeClient($resultat['iduser']);
                        $users = $unControleur->selectAllUsers();
                        require "vue/vue_modifier_vehicule_client.php";
                    }
                }
            }
        }
    break;
    case 3 : require "gestiondevis.php"; break;
    case 4 : header("Location:gestionvehicules.php"); break;
    case 5 : header("Location:gestionvehicules.php?dispo=non"); break;
    case 6 :
    $data = $cAdmin->selectAllClients();
    if(isset($_GET['action']) && $_GET['action'] == 'm' && isset($_GET['iduser']) && !empty($_GET['iduser'])) {
        $user = $cAdmin->selectUser($_GET['iduser']);
        require "vue/vue_update_client.php";
    }
    require 'vue/vue_list_clients.php'; break;
    case 7 :
    $data = $cAdmin->selectAllEssai();
    echo "<h3 style='text-align: center; margin-top: 100px;'>List des demandes d'essais</h3>";
    require 'vue/vue_list_resa.php'; break;
    default : require "vue/vue_ajouter_vehicule.php";
}
?>



<?php
require_once 'includes/footer.php';
?>