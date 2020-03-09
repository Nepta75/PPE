<?php
if (isset($_POST['connexion'])) {
    if(!empty($_POST['mail']) && !empty($_POST['mdp'])) {
        $mail = htmlspecialchars($_POST['mail']);
        // $mdp = sha1($_POST['mdp']);
        if ($this->connexion($mail, $_POST['mdp']) !== null) {
            $this->connexion($mail, $_POST['mdp']);
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
    if ($m = "ir") {
        $succes = "Succes : Inscription réussie, veuillez vous connecter !";
    }
}
?>

