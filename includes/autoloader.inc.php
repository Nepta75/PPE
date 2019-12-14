<?php
spl_autoload_register('autoloadControleur');

function autoloadControleur($class) {
    $array = [
        'controleur/',
        'modele/',
    ];
    foreach($array as $a) {
        $path = $a;
        $body = realpath(dirname(__DIR__));
        $fullPath = $body. '/' . $path . $class . '.php';
        $fullPath = str_replace('\\', '/', $fullPath);
        if (!file_exists($fullPath)) {
            return false;
        }
        include_once ($fullPath);
    }
}
?>