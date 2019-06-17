<?php
    require_once 'includes/header.php';
    $_SESSION = [];
    session_destroy();
    header("Location:gestionclient.php?succes=dc");
    exit();
    require_once 'includes/footer.php';
?>