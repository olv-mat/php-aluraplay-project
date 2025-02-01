<?php

require __DIR__ . "/../vendor/autoload.php";

use Project\MyPlayer\Model\Infrastructure\ConnectionCreator;
use Project\MyPlayer\Model\Repository\{
    UserRepository, VideoRepository
};
use Project\MyPlayer\Controller\{
    Controller,
    VideoListingController, 
    VideoFormInsertController,
    VideoFormUpdateController,
    DeleteVideoController,
};
use League\Plates\Engine;

$routes = require_once __DIR__ . "/../config/routes.php";

$templatesPath = __DIR__ . "/../views";
$template = new Engine($templatesPath);

$conn = ConnectionCreator::createConnection();
$repository = new VideoRepository($conn);


$pathInfo = $_SERVER["PATH_INFO"] ?? "/";
$requestMethod = $_SERVER["REQUEST_METHOD"];
$route = "$requestMethod|$pathInfo";

$userControllers = [
    "Project\MyPlayer\Controller\LoginController",
    "Project\MyPlayer\Controller\RegisterController"
];

session_start();
session_regenerate_id();
$allowedRoutes = ["/login", "/register"];
$isAllowedRoute = in_array($pathInfo, $allowedRoutes);
if (!array_key_exists("authenticated", $_SESSION) && !$isAllowedRoute) {
    header("Location: /login");
    exit();
} else {
    if (array_key_exists($route, $routes)) {
        $controllerClass = $routes[$route];
        if (in_array($controllerClass, $userControllers)) {
            $controller = new $controllerClass(new UserRepository($conn), $requestMethod, $template);
        } else {
            $controller = new $controllerClass(new VideoRepository($conn), $requestMethod, $template);
        }
        $controller->requestProcessing();
    } else {
        http_response_code(404);
    }
}
