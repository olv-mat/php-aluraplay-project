<?php

$route = $_SERVER["PATH_INFO"];
if (empty($route) || $route === "/") {
    require_once "video_listing.php";
} else if ($route === "/insert-video") {
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        require_once "video_form.php";
    } else {
        require_once "insert_video.php";
    }
} else if (strpos($route, "/update-video") !== false) {
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        require_once "video_form.php";
    } else {
        require_once "update_video.php";
    }
} else if (strpos($route, "/delete-video") !== false) {
    require_once "delete_video.php";
} 
