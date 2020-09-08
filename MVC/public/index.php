<?php
// On définit une constante contenant le dossier racine
define('ROOT', dirname(__DIR__));

// On charge l'Autoloader
use Cogit\Autoloader;
require_once ROOT.'/Autoloader.php';
Autoloader::register();

// On instancie Main
use Cogit\Core\Main;
$app = new Main();

// On démarre l'application
$app->start();