<?php
if(isset($_GET["delete"]) && !empty($_GET["delete"])) {
    $cAdmin->deleteDevis($_GET["delete"]);
}

$info = ['statut'=>'', 'id'=>''];

if (isset($_GET["delete"]) && !empty($_GET["delete"])) {
    $cAdmin->deleteDevis($_GET["delete"]);
}
if (isset($_GET['statut']) && !empty($_GET['statut']) && isset($_GET['id']) && !empty($_GET['id'])) {
    $info['id'] = htmlspecialchars($_GET['id']);
    $statut = htmlspecialchars($_GET['statut']);
    if ($statut == 'confirme') {
        $info['statut'] = 'confirme';
        $cAdmin->updateStatutDevis($info);
    } elseif ($statut == 'refuser') {
        $info['statut'] = 'refuser';
        $cAdmin->updateStatutDevis($info);
    }
}

$data = $cAdmin->selectAllDevis();
$somme = 0;
foreach($data as $d) {
    if (isset($d['prix']) && isset($d['Statut']) && $d['Statut'] == 'confirme') {
        $prix = intval($d['prix']);
        $somme += $prix;
    }
}
require 'vue/vue_list_devis.php';
?>