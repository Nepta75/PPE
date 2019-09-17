<?php
require ('includes/header.php');
require_once 'includes/identifiants_bdd.php';
if(isset($_GET['demande']) && isset($_GET['modele']) && isset($_GET['immat'])) {
    $cAdmin = new Administrateur ($env, $database, $user, $mdp);
    $dataVehicule = $cAdmin->selectVehicule($_GET['immat']);
   if ($_GET['demande'] == "resa") {
       $objet = "Demande de reservation";
       $message = "Vous avez demandez une réservation de vehicule pour le modele ".$_GET['modele'];
   } else if ($_GET['demande'] == "essai") {
        $objet = "Demande de d'essai";
       $message = "Vous avez demandez à essayer le vehicule de modele ".$_GET['modele'];
   }
} else {
    return;
}

if(isset($_POST['reserver'])) {
    if(!empty($_POST['d']) && !empty($_POST['t'])) {
        $cAdmin->insertEssayer($_POST, $dataVehicule['resultat']['idvehiculeneuf'], $_SESSION['idclient']);
        require 'controleur/controleur_mail.php';
        $cMail = new Mail ($env, $database, $user, $mdp);

        $mail = $_SESSION['email'];
        $message2 = $_SESSION['pseudo']." a fait une demande réservation du véhicule d'immatriculation ".$_GET['immat'].", modele : ".$_GET['modele']." Pour le : ".$_POST['d']." à ".$_POST['t'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $telephone = $_SESSION['tel'];

        $cMail->mail_contact_info($mail, $message2, $objet, $nom, $prenom, $telephone);
        $cMail->mail_resa_confirm($mail, $nom, $prenom, $dataVehicule['resultat']);
        $succes = "Succès : Votre demande de reservation à bien été envoyé ! Vous allez recevoir un mail de confirmation";
    } else {
        $erreur = "Veuillez remplir tous les champs !";
    }
}
?>

<?php
if(isset($succes)) {
    echo "<div class='succes-message center'>".$succes."</div>";
} else if(isset($erreur)) {
    echo "<div class='error-message center'>".$erreur."</div>";
}
?>

<div class="gestionresa_page">
    <h3><?php if (isset($message)) { echo $message; } else { echo "Page réservation / demande d'essai"; } ?></h3>
    <div class="gestionresa-header">
        <form action="" method="POST">
            <div class="modele"><label for="modele">Modele choisis : </label><b><?= $_GET['modele'] ?></b></div>
            <img src="<?= $dataVehicule['resultat']['img']?>" alt='img_vehicule' />
            <div><label for="d">Jour - Mois : </label><input type="date" id="d" name="d" /></div>
            <div><label for="t">Heure : </label><input type="time" id="t" name="t" /></div>
            <div><input type="submit" name="reserver" value="reserver" /></div>
        </form>
    </div>
</div>

<?php
require ('includes/footer.php');
?>