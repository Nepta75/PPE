<?php
    $data = ['statut'=>'', 'id_essayer'=>''];

    if (isset($_GET["delete"]) && !empty($_GET["delete"])) {
        $this->cAdmin->deleteEssayer($_GET["delete"]);
    }
    if (isset($_GET['statut']) && !empty($_GET['statut']) && isset($_GET['id']) && !empty($_GET['id'])) {
        $data['id_essayer'] = htmlspecialchars($_GET['id']);
        $essai = $this->cAdmin->selectEssai($data['id_essayer']);
        $statut = htmlspecialchars($_GET['statut']);
        if ($statut == 'confirme') {
            $data['statut'] = 'confirme';
            $this->cAdmin->udapteEssayer($data);
            $cMail->mail_resa_confirm_status($essai);
        } elseif ($statut == 'refuser') {
            $data['statut'] = 'refuser';
            $this->cAdmin->udapteEssayer($data);
            $cMail->mail_resa_cancel_status($essai);
        }
    }
    $data = $this->cAdmin->selectAllEssai();
    require VIEW."pages/admin/lists/list_essai/vue/vue_list_essais.php" ;
?>