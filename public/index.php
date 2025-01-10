<?php

require __DIR__ . "/../vendor/autoload.php";

$route = $_SERVER["PATH_INFO"];
if (empty($route) || $route === "/") {
    require_once __DIR__ . "/../video_listing.php";
} else if ($route === "/insert-video") {
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        require_once __DIR__ . "/../video_form.php";
    } else {
        require_once __DIR__ . "/../insert_video.php";
    }
} else if (strpos($route, "/update-video") !== false) {
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        require_once __DIR__ . "/../video_form.php";
    } else {
        require_once __DIR__ . "/../update_video.php";
    }
} else if (strpos($route, "/delete-video") !== false) {
    require_once __DIR__ . "/../delete_video.php";
} else {
    http_response_code(404);
}
