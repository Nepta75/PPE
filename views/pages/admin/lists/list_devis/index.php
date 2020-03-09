<?php
if(isset($_GET["delete"]) && !empty($_GET["delete"])) {
    $this->cAdmin->deleteDevis($_GET["delete"]);
}

$info = ['statut'=>'', 'id'=>''];

if (isset($_GET["delete"]) && !empty($_GET["delete"])) {
    $this->cAdmin->deleteDevis($_GET["delete"]);
}
if (isset($_GET['statut']) && !empty($_GET['statut']) && isset($_GET['id']) && !empty($_GET['id'])) {
    $info['id'] = htmlspecialchars($_GET['id']);
    $statut = htmlspecialchars($_GET['statut']);
    if ($statut == 'confirme') {
        $info['statut'] = 'confirme';
        $this->cAdmin->updateStatutDevis($info);
    } elseif ($statut == 'refuser') {
        $info['statut'] = 'refuser';
        $this->cAdmin->updateStatutDevis($info);
    }
}

$data = $this->cAdmin->selectAllDevis();
$somme = 0;
foreach($data as $d) {
    if (isset($d['prix']) && isset($d['Statut']) && $d['Statut'] == 'confirme') {
        $prix = intval($d['prix']);
        $somme += $prix;
    }
}
require VIEW.'pages/admin/lists/list_devis/vue/vue_list_devis.php';
?>