<?php
require_once 'includes/header.php';
require_once ("controleur/controleur.php");
$unControler = new Controleur("localhost", "bmwppe", "root", "");
$admin = $unControler->verifAdmin();
if ($admin == null) {
   $error = "Erreur - 404. Page introuvable";
}
?>

<?php
if(isset($error)) {
    echo "<div class='error-message center'>".$error."</div>";
    echo "<a href='index.php'>Retour à l'accueil</a>";
    return;
}
?>


<?php
require_once 'includes/footer.php';
?>