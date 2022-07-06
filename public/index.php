<?php


require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../Router.php';
require __DIR__ . '/../src/Model/DB_Connect.php';
require __DIR__ . '/../Config.php';

use App\Router;
use Symfony\Component\ErrorHandler\Debug;


Debug::enable();

session_start();

try {
    Router::route();
} catch (ReflectionException $e) {
    echo "La connexion a échoué";
}