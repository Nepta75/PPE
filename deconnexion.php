<?php
    require_once 'includes/header.php';
    $_SESSION = [];
    session_destroy();
    header("Location:index.php");
    exit();
    require_once 'includes/footer.php';
?>