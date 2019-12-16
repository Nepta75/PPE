<?php
require_once "../../includes/header.php";
$unControler = new Controleur('localhost', 'bmwv2', 'root', '');
if (isset($_POST['connexion'])) {
    if(!empty($_POST['mail']) && !empty($_POST['mdp'])) {
        $mail = htmlspecialchars($_POST['mail']);
        // $mdp = sha1($_POST['mdp']);
        if ($unControler->connexion($mail, $_POST['mdp']) !== null) {
            $unControler->connexion($mail, $_POST['mdp']);
        } else {
            $erreur = "Erreur : Veuillez vérifier vos identifiants";
        }
    } else {
        $erreur = 'Erreur : Veuillez remplir tous les champs !';
    }
}
?>

<?php
if (isset($_GET['succes']) && !isset($erreur)) {
    $m = $_GET['succes'];
    if ($m = "dc") {
        $succes = "Succes : Vous vous êtes deconnecté aves succes !";
    }
}
    require 'vue/vueconnexion.php';
    include "../../includes/footer.php";
?>

