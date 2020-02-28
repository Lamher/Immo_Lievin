<?php
session_start();
date_default_timezone_set('Europe/Paris');
require_once '../vendor/autoload.php';
require_once '../config/config.php'; 


use Core\App;

$app = new App();
$app->run();
