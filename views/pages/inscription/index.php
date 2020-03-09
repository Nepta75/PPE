<?php
if(isset($_POST['inscription'])) {
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse'])
    && !empty($_POST['tel']) && !empty($_POST['mail']) && !empty($_POST['mdp'])) {
        $this->inscription($_POST);
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
    require VIEW.'pages/inscription/vue/vue_inscription.php';
?>
