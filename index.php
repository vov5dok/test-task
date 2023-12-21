<?php

ini_set('display_errors', 1);
session_start();

use App\Controllers\AuthController;
use App\Controllers\PostController;
use App\Controllers\UserController;

require 'vendor/autoload.php';


//echo '<pre>';
//print_r($_SERVER);
//print_r($_REQUEST);
//echo '</pre>';
//exit();


$controller = $_REQUEST['controller'] ?? '/';
$controllerObj = match ($controller) {
    '/' => new AuthController(),
    'user' => new UserController,
    'auth' => new AuthController(),
    'post' => new PostController(),
};

$action = $_REQUEST['action'] ?? '/';
$view = match ($action) {
    '/' => $controllerObj->index(),
    'login' => $controllerObj->login(),
    'logout' => $controllerObj->logout(),
    'authenticate' => $controllerObj->authenticate(),
    'index' => $controllerObj->index(),
    'create' => $controllerObj->create(),
    'store' => $controllerObj->store(),
    'delete' => $controllerObj->delete(),
    'edit' => $controllerObj->edit(),
    'update' => $controllerObj->update(),
};

