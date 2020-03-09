<?php
require_once MODEL.'Model.php';
class ControllerMail {
    private $unModele;

    public function __construct ($serveur, $bdd, $user, $mdp) {
        $this->unModele = new Model ($serveur, $bdd, $user, $mdp);
    }

    public function mail_contact_info($mail_, $message, $sujet, $nom, $prenom, $numero) {
        $mail = "cfa_bmw@yopmail.com";
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
        {
            $passage_ligne = "\r\n";
        }
        else
        {
            $passage_ligne = "\n";
        }
        //=====Déclaration des messages au format texte et au format HTML.
        $message_txt = $message;
        $message_html = "<html><head></head><body><b>Message de : ".$nom." ".$prenom."<br></br> Email : 
        ".$mail_."
        <br></br>
        Numero : ".$numero."
        </b><br></br><hr>".$message."</body></html>";
        //==========
        
        //=====Création de la boundary
        $boundary = "-----=".md5(rand());
        //==========
        
        //=====Création du header de l'e-mail.
        $header = "From: \"BMW-Paris\"<cfalokman@gmail.com>".$passage_ligne;
        $header.= "Reply-to: \"BMW-Paris\" <cfalokman@gmail.com>".$passage_ligne;
        $header.= "MIME-Version: 1.0".$passage_ligne;
        $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
        //==========
        
        //=====Création du message.
        $message = $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format texte.
        $message.= "Content-Type: text/plain; charset=\"utf-8\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_txt.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format HTML
        $message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_html.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        //==========
        
        //=====Envoi de l'e-mail.
        $mail = mail($mail,$sujet,$message,$header);
        //==========
    }

    public function mail_contact_confirm($mail, $nom, $prenom) {
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
        {
            $passage_ligne = "\r\n";
        }
        else
        {
            $passage_ligne = "\n";
        }
        //=====Déclaration des messages au format texte et au format HTML.
        $message_txt = "
        Bonjour ".$nom." ".$prenom.", Nous avons bien reçu votre email,
        nous vous recontacterons au plus vite. Cordialement l'équipe BMW";

        $message_html = "<html><head></head><body>
        <img src='https://image.noelshack.com/fichiers/2019/51/1/1576453672-banniere-mail.jpg' alt='banniere_bmw' width='100%' />
        <br></br>
        Bonjour <b>".$nom." ".$prenom."</b>, 
        <br></br>Nous vous confirmons l'envoi de votre message à BMW.
        <br></br>
        Nous reprendrons contact avec vous sous un délai de 24 heures. <br></br>Cordialement l'équipe BMW Paris.
        <hr>
        <br></br>
        <br</br>
        Ceci est un message automatique ne pas répondre Merci.
        </body></html>";
        //==========

        $sujet = "BMW - Votre mail nous a bien été transmi";
        
        //=====Création de la boundary
        $boundary = "-----=".md5(rand());
        //==========
        
        //=====Création du header de l'e-mail.
        $header = "From: \"BMW-Paris\"<cfalokman@gmail.com>".$passage_ligne;
        $header.= "Reply-to: \"BMW-Paris\" <cfalokman@gmail.com>".$passage_ligne;
        $header.= "MIME-Version: 1.0".$passage_ligne;
        $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
        //==========
        
        //=====Création du message.
        $message = $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format texte.
        $message.= "Content-Type: text/plain; charset=\"utf-8\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_txt.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format HTML
        $message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_html.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        //==========
        
        //=====Envoi de l'e-mail.
        mail($mail,$sujet,$message,$header);
        //==========
    }

    public function mail_resa_confirm($mail, $nom, $prenom, $datavehicule) {
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
        {
            $passage_ligne = "\r\n";
        }
        else
        {
            $passage_ligne = "\n";
        }
        //=====Déclaration des messages au format texte et au format HTML.
        $message_txt = "
        Bonjour ".$nom." ".$prenom.", Nous avons bien reçu votre demande de reservation pour le modele ".$datavehicule['modele'].",
        nous vous recontacterons au plus vite pour vous confirmer ou pas votre demande d'essai. Cordialement l'équipe BMW";

        $message_html = "<html><head></head><body>
        <img src='https://image.noelshack.com/fichiers/2019/51/1/1576453672-banniere-mail.jpg' alt='banniere_bmw' width='100%' />
        <br></br>
        Bonjour <b>".$nom." ".$prenom."</b>, 
        <br></br>Nous vous confirmons votre demande d'essai de vehicule de modele ".$datavehicule['modele']." au près de chez nous.
        <br></br>
        Nous reprendrons contact avec vous sous un délai de 24 heures pour vous confirmer votre demande. <br></br>Cordialement l'équipe BMW Paris.
        <hr>
        <br></br>
        <br</br>
        Ceci est un message automatique ne pas répondre Merci.
        </body></html>";
        //==========

        $sujet = "BMW - Demande d'essai";
        
        //=====Création de la boundary
        $boundary = "-----=".md5(rand());
        //==========
        
        //=====Création du header de l'e-mail.
        $header = "From: \"BMW-Paris\"<cfalokman@gmail.com>".$passage_ligne;
        $header.= "Reply-to: \"BMW-Paris\" <cfalokman@gmail.com>".$passage_ligne;
        $header.= "MIME-Version: 1.0".$passage_ligne;
        $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
        //==========
        
        //=====Création du message.
        $message = $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format texte.
        $message.= "Content-Type: text/plain; charset=\"utf-8\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_txt.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format HTML
        $message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_html.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        //==========
        
        //=====Envoi de l'e-mail.
        mail($mail,$sujet,$message,$header);
        //==========
    }

    public function mail_resa_confirm_status($essai) {
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $essai['mail'])) // On filtre les serveurs qui rencontrent des bogues.
        {
            $passage_ligne = "\r\n";
        }
        else
        {
            $passage_ligne = "\n";
        }
        //=====Déclaration des messages au format texte et au format HTML.
        $message_txt = "
        Bonjour ".$essai['nom']." ".$essai['prenom'].", Nous vous confirmons votre demande d'essai de vehicule de modele ".$essai['modele']." au près de chez nous Le ".$essai['date_essayage'];

        $message_html = "<html><head></head><body>
        <img src='https://image.noelshack.com/fichiers/2019/51/1/1576453672-banniere-mail.jpg' alt='banniere_bmw' width='100%' />
        <br></br>
        Bonjour <b>".$essai['nom']." ".$essai['prenom']."</b>, 
        <br></br>Votre demande d'essai de vehicule de modele ".$essai['modele']." au près de chez nous a bien été confirmé. Nous vous attendons le ".$essai['date_essayage']."
        <br></br>
        Cordialement l'équipe BMW Paris.
        <hr>
        <br></br>
        <br</br>
        Ceci est un message automatique ne pas répondre Merci.
        </body></html>";
        //==========

        $sujet = "BMW - Confirmation de votre demande d'essai";
        
        //=====Création de la boundary
        $boundary = "-----=".md5(rand());
        //==========
        
        //=====Création du header de l'e-mail.
        $header = "From: \"BMW-Paris\"<cfalokman@gmail.com>".$passage_ligne;
        $header.= "Reply-to: \"BMW-Paris\" <cfalokman@gmail.com>".$passage_ligne;
        $header.= "MIME-Version: 1.0".$passage_ligne;
        $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
        //==========
        
        //=====Création du message.
        $message = $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format texte.
        $message.= "Content-Type: text/plain; charset=\"utf-8\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_txt.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format HTML
        $message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_html.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        //==========
        
        //=====Envoi de l'e-mail.
        mail($essai['mail'],$sujet,$message,$header);
        //==========
    }

    public function mail_resa_cancel_status($essai) {
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $essai['mail'])) // On filtre les serveurs qui rencontrent des bogues.
        {
            $passage_ligne = "\r\n";
        }
        else
        {
            $passage_ligne = "\n";
        }
        //=====Déclaration des messages au format texte et au format HTML.
        $message_txt = "
        Bonjour ".$essai['nom']." ".$essai['prenom'].", Votre demande d'essai de vehicule de modele ".$essai['modele']." au près de chez nous Le ".$essai['date_essayage']."a été anullé";

        $message_html = "<html><head></head><body>
        <img src='https://image.noelshack.com/fichiers/2019/51/1/1576453672-banniere-mail.jpg' alt='banniere_bmw' width='100%' />
        <br></br>
        Bonjour <b>".$essai['nom']." ".$essai['prenom']."</b>, 
        <br></br>Votre demande d'essai de vehicule de modele ".$essai['modele']." au près de chez nous ne peut pas être prise en compte. Veuillez nous contacter pour plus d'information.
        <br></br>
        Cordialement l'équipe BMW Paris.
        <hr>
        <br></br>
        <br</br>
        Ceci est un message automatique ne pas répondre Merci.
        </body></html>";
        //==========

        $sujet = "BMW - Refus de votre demande";
        
        //=====Création de la boundary
        $boundary = "-----=".md5(rand());
        //==========
        
        //=====Création du header de l'e-mail.
        $header = "From: \"BMW-Paris\"<cfalokman@gmail.com>".$passage_ligne;
        $header.= "Reply-to: \"BMW-Paris\" <cfalokman@gmail.com>".$passage_ligne;
        $header.= "MIME-Version: 1.0".$passage_ligne;
        $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
        //==========
        
        //=====Création du message.
        $message = $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format texte.
        $message.= "Content-Type: text/plain; charset=\"utf-8\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_txt.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format HTML
        $message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_html.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        //==========
        
        //=====Envoi de l'e-mail.
        mail($essai['mail'],$sujet,$message,$header);
        //==========
    }
}

?>