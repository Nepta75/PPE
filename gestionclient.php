<?php
require_once ("includes/header.php");
require_once ("controleur/controleur.php");
require_once 'includes/identifiants_bdd.php';
$unControler = new Controleur($env, $database, $user, $mdp);
if (isset($_POST['connexion'])) {
    if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        // $mdp = sha1($_POST['mdp']);
        if ($unControler->connexion($pseudo, $_POST['mdp']) !== null) {
            $unControler->connexion($pseudo, $_POST['mdp']);
        } else {
            $erreur = "Erreur : Veuillez vérifier vos identifiants";
        }
    } else {
        $erreur = 'Erreur : Veuillez remplir tous les champs !';
    }
}

if(isset($_POST['inscription'])) {
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse_rue']) && !empty($_POST['adresse_cp'])
    && !empty($_POST['ville']) && !empty($_POST['tel']) && !empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['mdp'])) {
        $unControler->inscription($_POST);
    } else {
        $erreur = "Erreur Veuillez remplire tous les champs !";
    }
}
?>


<?php
if (isset($_GET['succes']) && !isset($erreur)) {
    $m = $_GET['succes'];
    if($m = "in") {
   $succes = "Succes : Votre insciption c'est bien passé, vous pouvez desormais vous connectez !";
    }
    if ($m = "dc") {
        $succes = "Succes : Vous vous êtes deconnecté aves succes !";
    }
}
if(isset($_GET['inscription'])) {
    require 'vue/vue_inscription.php';
} else {
    require 'vue/vueconnexion.php';
}
?>

<?php
  include "includes/footer.php";
?>

