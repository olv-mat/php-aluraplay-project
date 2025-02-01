<?php

use Project\MyPlayer\Controller\{
    Controller,
    LoginController,
    RegisterController,
    LogoutController,
    VideoListingController, 
    VideoFormInsertController,
    VideoFormUpdateController,
    DeleteVideoController,
    RemoveBannerController,
    VideosJsonController,
    NewVideoJsonController,
};

return [
    "GET|/login" => LoginController::class,
    "POST|/login" => LoginController::class,
    "GET|/register" => RegisterController::class,
    "POST|/register" => RegisterController::class,
    "GET|/logout" => LogoutController::class,
    "GET|/" => VideoListingController::class,
    "GET|/insert-video" => VideoFormInsertController::class,
    "POST|/insert-video" => VideoFormInsertController::class,
    "GET|/update-video" => VideoFormUpdateController::class,
    "POST|/update-video" => VideoFormUpdateController::class,
    "GET|/delete-video" => DeleteVideoController::class,
    "GET|/remove-banner" => RemoveBannerController::class,
    "GET|/videos-json" => VideosJsonController::class,
    "POST|/videos-json" => NewVideoJsonController::class,
];
