<?php
$vehiculesNeufs = $this->selectAllVehiculesNeuf();
$vehiculesOccasions = $this->selectAllVehiculesOccasion();
$data = ['immat'=>'', 'date'=>'', 'id_user'=>$_SESSION['id_user']];

if (isset($_POST['form_essayer'])) {
    if (!empty($_POST['vehicule']) && !empty($_POST['date'])) {
        $date = htmlspecialchars($_POST['date']);
        $data['immat'] = htmlspecialchars($_POST['vehicule']);
        $data['date'] = str_replace('T', ' ', $date);
    } else {
        $erreur = "Veuillez remplire tous les champs !";
    }
}

if (isset($_GET['immat'])) {
    $data['immat'] = htmlspecialchars($_GET['immat']);
}
if (isset($_GET['date'])) {
    $date = htmlspecialchars($_GET['date']);
    $data['date'] = str_replace('T', ' ', $date);
}

if (!empty($data['immat']) && !empty($data['date']) && !empty($data['id_user'])) {
    $this->addEssai($data);
    $succes = "Réservation éffectuer avec succès !";
    $vehicule = $this->selectVehicule($data['immat']);
    $mail = $_SESSION['email'];
    $message2 = $_SESSION['nom'].' '.$_SESSION['prenom']." a fait une demande réservation du véhicule d'immatriculation "
        .$vehicule['data']['immatriculation'].", modele : ".$vehicule['data']['modele']." Pour le : ".$data['date'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $telephone = $_SESSION['tel'];
    $objet = "Demande de reservation";

    $cMail->mail_contact_info($mail, $message2, $objet, $nom, $prenom, $telephone);
    $cMail->mail_resa_confirm($mail, $nom, $prenom, $vehicule['data']);
}
?>

<?php 
if (isset($succes)) echo '<div class="succes-message">'.$succes.'</div>';
if (isset($erreur)) echo '<div class="error-message">'.$erreur.'</div>';
?>
<div class="essayer">
    <form action='' method='POST'>
        <div>
            <label>Vehicule par immatriculation :</label>
            <select name="vehicule">
                <option value="<?= $data['immat'] ?>"><?php if (!empty($data['immat'])) { echo $data['immat']; }
                    else { echo '-- Selectionner un Vehicule --'; } ?></option>
                <?php if ($vehiculesNeufs != null ) { foreach($vehiculesNeufs as $vehiculeNeuf) { ?>
                <option name="<?= $vehiculeNeuf['immatriculation'] ?>"><?= $vehiculeNeuf['immatriculation'] ?>
                </option>
                <?php }} ?>
                <option value="">-- Vehicule d'occasion --</option>
                <?php if ($vehiculesOccasions != null ) { foreach($vehiculesOccasions as $vehiculesOccasion) { ?>
                <option name="<?= $vehiculesOccasion['immatriculation'] ?>">
                    <?= $vehiculesOccasion['immatriculation'] ?></option>
                <?php }} ?>
            </select>
        </div>
        <div><label>Date d'essai :</label><input name='date' type='datetime-local'></div>
        <input type="submit" name="form_essayer" value='Faire une demande' />
    </form>
</div>