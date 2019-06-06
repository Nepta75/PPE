<?php
    require_once 'includes/header.php';
    require 'controleur/controleur_mail.php';
    $cMail = new Mail ("localhost", "bmwppe", "root", "");
    if (isset($_POST['envoyer'])) {
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['numero'])
        && !empty($_POST['objet']) && !empty($_POST['message'])) {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $objet = htmlspecialchars($_POST['objet']);
            $message = htmlspecialchars($_POST['message']);
            if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                $mail = $_POST['mail'];
                $telephone = $_POST['numero'];
                if (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $telephone))
                {
                    $meta_carac = array("-", ".", " ");
                    $telephone = str_replace($meta_carac, "", $telephone);
                    $telephone = chunk_split($telephone, 2, "\r");
                    
                    $cMail->mail_contact_info($mail, $message, $objet, $nom, $prenom, $telephone);
                    $cMail->mail_contact_confirm($mail, $nom, $prenom);
                    $succes = "Succès : Votre mail à bien été envoyé ! Vous allez recevoir un mail de confirmation";

                }
                else {
                    $error = $telephone." n'est pas un numéro valide";
                }
              } else {
                  $error = "Erreur : Email invalide !";
              }
        } else {
            $error = "Erreur : Veuillez remplire tous les champs !";
        }
    }
?>


<?php if(isset($error)) {
    echo "<div class='error-message'>".$error."</div>";
} else if(isset($succes)) {
    echo "<div class='succes-message'>".$succes."</div>";
}
?>


<div class="contact-info">
    <div class="sub-block-contact-info">
        <h4>Horraire d'ouverture :</h4>
        <div>Lundi : 9h00 - 12h00 | 14h00 - 19h00</div>
        <div>mardi : 9h00 - 12h00 | 14h00 - 19h00</div>
        <div>mercredi : 9h00 - 12h00 | 14h00 - 19h00</div>
        <div>jeudi : 9h00 - 12h00 | 14h00 - 19h00</div>
        <div>vendredi : 9h00 - 12h00 | 14h00 - 19h00</div>
        <div>samedi : fermé</div>
        <div>dimanche : fermé</div>
        <hr>
        <div><i class="fas fa-phone-square-alt"> Tel : </i><b> 01 85 53 09 07</b></div>
        <div><i class="fas fa-phone-square-alt"> Service client : </i><b> 0 800 26 98 00</b></div>
    </div>
    <div class="googlemap_contact">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9428952031553!2d2.346209615201703!3d48.85929930859748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1ef1899367%3A0x58637dd65480b424!2sBMW+BYmyCAR+Paris+Rivoli!5e0!3m2!1sfr!2sfr!4v1559820921417!5m2!1sfr!2sfr" width="800" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>

<?php
    include 'vue/vue_form_contact.php';
?>

<?php
    require_once 'includes/footer.php';
?>