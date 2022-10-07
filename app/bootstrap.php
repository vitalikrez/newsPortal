<?php

define('BASE_URL', "http://newsPortal/app");



// App paths
define('CONTROLLERS_DIR', __DIR__ . '/controllers');
define('MODELS_DIR', __DIR__ . '/models');
define('CLASSES_DIR', __DIR__ . '/classes');
define('VIEWS_DIR', __DIR__ . '/views');

// DB connection
define('MYSQL_DSN', "mysql:host=localhost;dbname=newsPortal");
define('MYSQL_USER', "root");
define('MYSQL_PASS', /*"root"*/ "");


// know how to load app classes
require_once __DIR__ . '/autoload.php';


$routes = [
    // display main
    'home' => 'MainController@home',

    // display About
    'about' => 'MainController@about',

    // display News
    'news' => 'MainController@news',

    // display main Admin
    'admin' => 'AdminController@home',

    // save AdminController
    'save' => 'AdminController@save',

];

require_once __DIR__ . '/router.php';
