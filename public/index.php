<?php

require __DIR__ . "/../vendor/autoload.php";

use Project\AluraPlay\Repository\VideoRepository;
use League\Plates\Engine;
use Project\AluraPlay\Controller\{
    Controller,
    VideoListingController, 
    VideoFormInsertController,
    VideoFormUpdateController,
    DeleteVideoController,
};
use Project\AluraPlay\Infrastructure\ConnectionCreator;

$templatesPath = __DIR__ . "/../views";
$template = new Engine($templatesPath);


$conn = ConnectionCreator::createConnection();
$repository = new VideoRepository($conn);

$routes = require_once __DIR__ . "/../config/routes.php";

$pathInfo = $_SERVER["PATH_INFO"] ?? "/";
$requestMethod = $_SERVER["REQUEST_METHOD"];
$route = "$requestMethod|$pathInfo";

session_start();
session_regenerate_id();
$isLoginRoute = $pathInfo === "/login";
if (!array_key_exists("authenticated", $_SESSION) && !$isLoginRoute) {
    header("Location: /login");
    return;
}

if (array_key_exists($route, $routes)) {
    $controllerClass = $routes[$route];
    if ($controllerClass == "Project\AluraPlay\Controller\LoginController") {
        $controller = new $controllerClass($conn, $requestMethod, $template);
    } else {
        $controller = new $controllerClass($repository, $requestMethod, $template);
    }
    $controller->requestProcessing();
} else {
    http_response_code(404);
}
