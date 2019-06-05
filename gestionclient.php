<?php
require_once 'includes/header.php';
require_once ("controleur/controleur.php");
$unControler = new Controleur("localhost", "bmwppe", "root", "");
if (isset($_POST['connexion'])) {
    if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        // $mdp = sha1($_POST['mdp']);
        if ($unControler->connexion($pseudo, $_POST['mdp']) !== null) {
            $unControler->connexion($pseudo, $_POST['mdp']);
        } else {
            $error = "Erreur : Veuillez vérifier vaux identifiants";
        }
    } else {
        $error = 'Erreur :Veuillez remplir tous les champs !';
    }
}
?>


<?php
if(isset($error)) {
    echo "<div class='error-message'>".$error."</div>";
}
require 'vue/vueconnexion.php';
?>


<?php
require_once 'includes/footer.php';
?>