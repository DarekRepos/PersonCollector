<?php
session_start();

use PersonCollector\Connection;
use PersonCollector\Users;

require 'vendor/autoload.php';

require 'views/header.php';
require 'views/nav.php';


$request = $_SERVER['REQUEST_URI'];
$actionURL=explode("?",$request);


/*TODO: Could refavtor to classes or library but don't need reusability */

switch ($request) {
    case '/' :
        require __DIR__ . '/pages/home.php';
        break;
    case '' :
        require __DIR__ . '/pages/home.php';
        break;
    case '/add' :
        require __DIR__ . '/pages/add.php';
        break;
    case '/viewpersons' :
        require __DIR__ . '/pages/viewpersons.php';
        break;
    case (preg_match('/(edit)/', substr($actionURL[0],1)) &&
        preg_match('/(id=)+[0-9]*/', $actionURL[1])) ? true : false :
        require __DIR__ . '/pages/edit.php';
        break;
    case (preg_match('/(delete)/', substr($actionURL[0],1)) &&
        preg_match('/(id=)+[0-9]*/', $actionURL[1])) ? true : false :
        require __DIR__ . '/pages/delete.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/pages/404.php';
        break;
}

//TODO: add style and javasvcript elements
//TODO: check and regroup files and folders

if (isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

require 'views/footer.php';

