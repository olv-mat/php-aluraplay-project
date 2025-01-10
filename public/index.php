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
$route = $_SERVER["PATH_INFO"];

if (empty($route) || $route === "/") {
    $controller = new VideoListingController($repository);
    $controller->requestProcessing();
} else if ($route === "/insert-video") {
    $controller = new VideoFormInsertController($repository, $_SERVER["REQUEST_METHOD"]);
    $controller->requestProcessing();
} else if (strpos($route, "/update-video") !== false) {
    $controller = new VideoFormUpdateController($repository, $_SERVER["REQUEST_METHOD"]);
    $controller->requestProcessing();
} else if (strpos($route, "/delete-video") !== false) {
    $controller = new DeleteVideoController($repository);
    $controller->requestProcessing();
} else {
    http_response_code(404);
}
