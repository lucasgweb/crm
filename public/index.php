<?php
session_start();
require '../vendor/autoload.php';
require '../src/routes.php';
require_once '../src/functions/functions.php';


$router->run( $router->routes );