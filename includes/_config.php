<?php
/*** Configuration *****/
session_start();
ini_set('display_error', 'on');
error_reporting(E_ALL);

$root = $_SERVER['DOCUMENT_ROOT'];
$host = $_SERVER['HTTP_HOST'];

define('ROOT', $root.'/ppe/');
define('ROOT2', 'http://'.$root.'/ppe/');
define('HOST', $host.'/ppe');

define('CONTROLLER', ROOT.'controleur/');
define('INCLUDES', ROOT.'includes/');
define('FUNC', ROOT.'functions/');
define('VIEW', ROOT.'views/');
define('MODEL', ROOT.'modele/');
define('CLASSE', ROOT.'classes/');

define('IMG', 'img/');


/** SQL Connexion ***/
define('DBHOST', 'localhost');
define('DBNAME', 'bmwv2');
define('DBUSER', 'root');
define('DBMDP', '');
?>