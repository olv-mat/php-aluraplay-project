<?php

require __DIR__ . "/../vendor/autoload.php";

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Controller\{
    Controller,
    VideoListingController, 
    VideoFormInsertController,
    VideoFormUpdateController,
    DeleteVideoController,
};

$dbPath = __DIR__ . "/../db.sqlite";
$conn = new PDO("sqlite:$dbPath");
$repository = new VideoRepository($conn);

$routes = require_once __DIR__ . "/../config/routes.php";

$pathInfo = $_SERVER["PATH_INFO"] ?? "/";
$requestMethod = $_SERVER["REQUEST_METHOD"];
$route = "$requestMethod|$pathInfo";

session_start();
$isLoginRoute = $pathInfo === "/login";
if (!array_key_exists("authenticated", $_SESSION) && !$isLoginRoute) {
    header("Location: /login");
    return;
}

if (array_key_exists($route, $routes)) {
    $controllerClass = $routes[$route];
    if ($controllerClass == "Project\AluraPlay\Controller\LoginController") {
        $controller = new $controllerClass($conn, $requestMethod);
    } else {
        $controller = new $controllerClass($repository, $requestMethod);
    }
    $controller->requestProcessing();
} else {
    http_response_code(404);
}
