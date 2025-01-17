<?php

use Project\AluraPlay\Controller\{
    Controller,
    VideoListingController, 
    VideoFormInsertController,
    VideoFormUpdateController,
    DeleteVideoController,
    LoginController,
    LogoutController,
};

return [
    "GET|/" => VideoListingController::class,
    "GET|/insert-video" => VideoFormInsertController::class,
    "POST|/insert-video" => VideoFormInsertController::class,
    "GET|/update-video" => VideoFormUpdateController::class,
    "POST|/update-video" => VideoFormUpdateController::class,
    "GET|/delete-video" => DeleteVideoController::class,
    "GET|/login" => LoginController::class,
    "POST|/login" => LoginController::class,
    "GET|/logout" => LogoutController::class,
];
