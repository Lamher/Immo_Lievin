<?php

define('ROOT', __DIR__ . '/');

define('BASE_DIR', '/Immo_Lievin/public/');
define('PATH_VIEWS', ROOT . '../app/views/');
define('PATH_MODELS', ROOT . '../app/models/');

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'Immo_Lievin');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

define('DEFAULT_CONTROLLER', 'index');
define('DEFAULT_METHOD', 'index');

//Liste des modules a preciser dans l'url
define('TAB_MODULES', ['admin', 'account']);
define('DEFAULT_MODULE', 'front');

define('BASE_URI', 'http://localhost/Immo_Lievin/public/');
define('BASE_IMG', 'http://localhost/Immo_Lievin/public/images/properties/');
define('BASE_IMG_PROPERTIES','C:\wamp64\www\Immo_Lievin\public\images\properties\\');
define('BASE_URI_ADMIN', BASE_URI . 'admin/');
