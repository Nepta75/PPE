<?php
require_once 'includes/header.php';
require_once ("controleur/controleur_admin.php");
$cAdmin = new Administrateur("localhost", "bmwppe", "root", "");
$admin = $cAdmin->verifAdmin();
if ($admin == null) {
   $error = "Erreur - 404. Page introuvable";
} else {
    if (isset($_GET['c']) && $_GET['c'] == '1') {
?>
    <script>
        alert("<?php echo htmlspecialchars('Content de vous revoir '.$_SESSION['pseudo'], ENT_QUOTES); ?>")
    </script>
<?php
    }

    // AJOUT VEHICULE NEUF
    if(isset($_POST['add_vehicule_neuf'])) {
        $immatriculation = htmlspecialchars($_POST['immatriculation']);
        $type = $_POST['type'];
        $modele = htmlspecialchars($_POST['modele']);
        $millesime = intval($_POST['millesime']);
        $cylindree = intval($_POST['cylindree']);
        $energie = $_POST['energie'];
        $typeBoite = $_POST['typeBoite'];
        $prix = floatval($_POST['prix']);
        $date_imma = $_POST['dateImma'];
        $url_img = $_POST['img_vehicule'];

        if(!empty($immatriculation) && !empty($type) && !empty($modele) && !empty($millesime)
        && !empty($cylindree) && !empty($energie) && !empty($typeBoite) && !empty($prix) && 
        !empty($date_imma) && !empty($url_img)) {
            $cAdmin->addVehiculeNeuf($immatriculation, $type, $modele, $millesime, $cylindree
            ,$energie, $typeBoite, $prix, $date_imma, $url_img);
            $succes = "Succès : Vous venez d'ajoutez un nouveau Véhicule neuf !";
        } else {
            $error = "Veuillez remplire tous les champs !";
        }
    }

     // AJOUT VEHICULE OCCASION
    if(isset($_POST['add_vehicule_occasion'])) {
        $immatriculation = htmlspecialchars($_POST['immatriculation']);
        $type = $_POST['type'];
        $modele = htmlspecialchars($_POST['modele']);
        $millesime = intval($_POST['millesime']);
        $cylindree = intval($_POST['cylindree']);
        $energie = $_POST['energie'];
        $typeBoite = $_POST['typeBoite'];
        $km = intval($_POST['km']);
        $descriptif = $_POST['descriptif'];
        $valid = $_POST['valide_vehicule'];
        $prix = floatval($_POST['prix']);
        $date_imma = $_POST['dateImma'];
        $url_img = $_POST['img_vehicule'];

        if(!empty($immatriculation) && !empty($type) && !empty($modele) && !empty($millesime)
        && !empty($cylindree) && !empty($energie) && !empty($typeBoite) && !empty($prix) && 
        !empty($date_imma) && !empty($url_img)) {
            $cAdmin->addVehiculeOccas($immatriculation, $type, $modele, $millesime, $cylindree
            ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img);
            $succes = "Succès : Vous venez d'ajoutez un nouveau Véhicule d'occasion !";
        } else {
            $error = "Veuillez remplire tous les champs !";
        }
    }

    // AJOUT VEHICULE ClIENT
    if(isset($_POST['add_vehicule_client'])) {
        $user = htmlspecialchars($_POST['user']);
        $immatriculation = htmlspecialchars($_POST['immatriculation']);
        $type = $_POST['type'];
        $modele = htmlspecialchars($_POST['modele']);
        $millesime = intval($_POST['millesime']);
        $cylindree = intval($_POST['cylindree']);
        $energie = $_POST['energie'];
        $typeBoite = $_POST['typeBoite'];
        $km = intval($_POST['km']);
        $descriptif = $_POST['descriptif'];
        $valid = $_POST['valide_vehicule'];
        $prix = floatval($_POST['prix']);
        $date_imma = $_POST['dateImma'];
        $url_img = $_POST['img_vehicule'];

        if(!empty($user) && !empty($immatriculation) && !empty($type) && !empty($modele) && !empty($millesime)
        && !empty($cylindree) && !empty($energie) && !empty($typeBoite) && !empty($prix) && 
        !empty($date_imma) && !empty($url_img)) {
            $cAdmin->addVehiculeClient($user, $immatriculation, $type, $modele, $millesime, $cylindree
            ,$energie, $typeBoite, $km, $descriptif, $valid, $prix, $date_imma, $url_img);
            $succes = "Succès : Vous venez d'ajoutez un nouveau Véhicule pour ".$user." !";
        } else {
            $error = "Veuillez remplire tous les champs !";
        }
    }
}
?>

<?php
if(isset($error)) {
    echo "<div class='error-message center'>".$error."</div>";
    echo "<a href='index.php'>Retour à l'accueil</a>";
    return;
} else if(isset($succes)) {
    echo "<div class='succes-message center'>".$succes."</div>";
}

$page = 0;
if (isset($_GET['page'])) { $page = $_GET['page']; }
switch($page) {
    case 1 :  require "vue/vue_ajouter_vehicule.php"; break;
    case 2 : require "vue/vue_ajouter_vehicule.php"; break;
    case 3 : require "vue/vue_ajouter_vehicule.php"; break;
    case 4 : require "vue/vue_ajouter_vehicule.php"; break;
    case 5 : require "vue/vue_ajouter_vehicule.php"; break;
    default : require "vue/vue_ajouter_vehicule.php";
}
?>


<?php
require_once 'includes/footer.php';
?>