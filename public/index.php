<?php

// router.php

if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
} else {
    // echo "<p>Welcome to PHP</p>";

    // inicia sessão
    session_start();
    // define constantes
    define('DEFAULT_CONTROLLER', 'home');
    define('DEFAULT_METHOD', 'index');
    // carrega arquivos
    require '../vendor/autoload.php';  // autoload
    require '../App/Functions/functions_twig.php';
    require 'bootstrap/bootstrap.php';
}