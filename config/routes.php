<?php

use Project\AluraPlay\Controller\{
    Controller,
    VideoListingController, 
    VideoFormInsertController,
    VideoFormUpdateController,
    RemoveBannerController,
    DeleteVideoController,
    LoginController,
    LogoutController,
    VideosJsonController,
    NewVideoJsonController,
};

return [
    "GET|/" => VideoListingController::class,
    "GET|/insert-video" => VideoFormInsertController::class,
    "POST|/insert-video" => VideoFormInsertController::class,
    "GET|/update-video" => VideoFormUpdateController::class,
    "POST|/update-video" => VideoFormUpdateController::class,
    "GET|/remove-banner" => RemoveBannerController::class,
    "GET|/delete-video" => DeleteVideoController::class,
    "GET|/login" => LoginController::class,
    "POST|/login" => LoginController::class,
    "GET|/logout" => LogoutController::class,
    "GET|/videos-json" => VideosJsonController::class,
    "POST|/videos" => NewVideoJsonController::class,
];
