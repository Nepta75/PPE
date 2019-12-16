<?php
if(isset($_GET["delete"]) && !empty($_GET["delete"])) {
    $cAdmin->deleteDevis($_GET["delete"]);
}
$data = $cAdmin->selectAllDevis();
require 'vue/vue_list_devis.php';
?>