<?php
    $data = ['statut'=>'', 'id_essayer'=>''];

    if (isset($_GET["delete"]) && !empty($_GET["delete"])) {
        $cAdmin->deleteEssayer($_GET["delete"]);
    }
    if (isset($_GET['statut']) && !empty($_GET['statut']) && isset($_GET['id']) && !empty($_GET['id'])) {
        $data['id_essayer'] = htmlspecialchars($_GET['id']);
        $essai = $cAdmin->selectEssai($data['id_essayer']);
        $cMail = new Mail ('localhost', 'bmwv2', 'root', '');
        $statut = htmlspecialchars($_GET['statut']);
        if ($statut == 'confirme') {
            $data['statut'] = 'confirme';
            $cAdmin->udapteEssayer($data);
            $cMail->mail_resa_confirm_status($essai);
        } elseif ($statut == 'refuser') {
            $data['statut'] = 'refuser';
            $cAdmin->udapteEssayer($data);
            $cMail->mail_resa_cancel_status($essai);
        }
    }
    $data = $cAdmin->selectAllEssai();
    require "vue/vue_list_essais.php" ;
    require '../../includes/footer.php';
?>