<?php
session_start();
require __DIR__ . '/../includes.php';
try {
    Router::routeur();
} catch (ReflectionException $e) {
    echo "La connexion a échoué";
}