<?php
    session_start();
    $_SESSION = [];
    session_destroy();
    header("Location:pages/connexion/index.php?succes=dc");
    exit();
?>