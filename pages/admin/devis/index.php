<?php
require_once '../../../includes/header.php';
$unControleur = new Controleur('localhost', 'bmwv2', 'root', '');
$clients = $unControleur->selectAllClients();
$vehiculesNeufs = $unControleur->selectAllVehiculesNeuf();
$vehiculesOccasions = $unControleur->selectAllVehiculesOccasion();


if (isset($_POST['valid2'])) {
	if (!empty($_POST['vehicule'])) {
		$infoVehicule = $unControleur->selectVehicule($_POST['vehicule']);
		$user = $unControleur->selectClient(htmlspecialchars($_GET['user']));
		$dataDevis = 
			array (
				"sujet"=>$_GET['sujet'],
				"immatriculation"=>$_POST['vehicule'],
				"nom"=>$user['nom'],
				"prenom"=>$user['prenom'],
				"mail"=>$user['mail'],
				"adresse"=>$user['adresse'],
				"info"=> '',
				"prix"=> 0,
				"id_client"=> intval($user['id_user']),
				"id_technicien"=> intval($_SESSION['id_user']),
			);
		$unControleur->insertDevis($dataDevis);
	} else {
		$erreur = "Veuillez choisir un vehicule pour le devis !";
	}
}

if (isset($_POST['valide1'])) {
	if(!empty($_POST['subject']) && !empty($_POST['user'])) {
		header("Location:/ppe/pages/admin/devis/index.php?sujet=".$_POST['subject']."&user=".$_POST['user']);
		exit();
	} else {
		$erreur = "Veuillez remplir tous les champs !";
	}
}

if(isset($_GET['user']) && isset($_GET['sujet'])) {
	if (empty($_GET['user']) || empty($_GET['sujet'])) {
		$erreur = "Veuillez remplir tous les champs !";
	}
}

if (isset($_POST['annuler'])) {
	header("Location:/ppe/pages/admin/devis/index.php?");
	exit();
}
if(isset($erreur)){ echo "<div class='error-message'>".$erreur."</div>";}
?>

<div>
	<?php if (empty($_GET['user']) || empty($_GET['sujet'])) { ?>
		<div class="header_gestiondevis">
			<h2>Etape 1 : </h2>
			<form action="" method="POST">
				<div>
					<label> Faire un devis pour : </label>
					<select name="user">
						<option value="">--- Selectionner un client ---</option>
						<?php foreach($clients as $client){ ?>
							<option value="<?= $client['id_user']?>"><?= $client['nom'].', '.$client['prenom'] ?></option>
						<?php } ?>
					</select>
				</div>
				<div>
					<label> Selectionner le sujet du devis : </label>
					<select name="subject">
						<option value="">--- Selectionner un sujet ---</option>
						<option value="vente">--- Vente de vehicule ---</option>
						<option value="location">--- Location de vehicule ---</option>
					</select>
				</div>
				<div>
					<input type="submit" name="valide1" value="Continuer" />
				</div>
		<?php } ?>
			</form>
		</div>
	<?php 
	if (isset($_GET['sujet']) && !empty($_GET['sujet']) && isset($_GET['user']) && !empty($_GET['user'])) {
		$user = $unControleur->selectClient($_GET['user']);
	?>
		<div class="gestiondevis">
			<h2>Etape 2 :</h2>
			<form action="" method="POST">
				<div class="gestiondevis-block">
					<div><h4><label>Info Client : </label></h4></div>
					<div>nom : <b><?= $user['nom'] ?></b></div>
					<div>prenom : <b><?= $user['prenom'] ?></b></div>
					<div>adresse : <b><?= $user['adresse'] ?></b></div>
					<div>tel : <b><?= "+33 ".$user['tel'] ?></b></div>
				</div>
			<?php if ($_GET['sujet'] == 'vente') { ?>
				<div class="gestiondevis-block">
				<div><h4>sujet : <b style="color : #3DC97F"><?= $_GET['sujet'] ?></b></h4>
					<label>Vehicules disponibles (par immatriculation) : </label>
					<select name="vehicule">
						<option value="">-- Selectionner un Vehicule --</option>
					<?php if ($vehiculesNeufs != null ) { foreach($vehiculesNeufs as $vehiculeNeuf) { ?>
						<option name="<?= $vehiculeNeuf['immatriculation'] ?>"><?= $vehiculeNeuf['immatriculation'] ?></option>
					<?php }} ?>
						<option value="">-- Vehicule d'occasion  --</option>
					<?php if ($vehiculesOccasions != null ) { foreach($vehiculesOccasions as $vehiculesOccasion) { ?>
						<option name="<?= $vehiculesOccasion['immatriculation'] ?>"><?= $vehiculesOccasion['immatriculation'] ?></option>
					<?php }} ?>
					</select>
				</div>
			<?php } ?>
			</div>
			<div class="devis-btn">
				<input type="submit" name="valid2" value="Generer un devis" />
				<input type="submit" name="annuler" value="Annuler" />
				</div>
			</form>
	<?php } ?>
</div>


<?php
require_once '../../../includes/footer.php';
?>