<?php

use Laminas\Diactoros\ServerRequestFactory;

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers:{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

$request = ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);

$router = new League\Route\Router;
$router->setStrategy($strategy);

try {
 $router->map('GET', '/', 'App\Application\MyDashboard\Controllers\DashboardController::index');
 $response = $router->dispatch($request);
 (new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
} catch(Exception $e) {
 var_dump($e->getMessage());
 die();
}
