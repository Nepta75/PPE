<?php
require_once "../../includes/header.php";
$unControler = new Controleur('localhost', 'bmwv2', 'root', '');

if(isset($_POST['inscription'])) {
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse'])
    && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['mdp'])) {
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
}
    require 'vue/vue_inscription.php';
    include "../../includes/footer.php";
?>
