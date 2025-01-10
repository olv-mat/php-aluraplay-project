<?php

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST, "titulo");

if (!$id || !$url || !$title) {
    header("Location: /?success=0");
    exit();   
}

$dbPath = __DIR__ . "/db.sqlite";
$conn = new PDO("sqlite:$dbPath");

$video = new Video($id, $url, $title);
$repository = new VideoRepository($conn);
$result = $repository->updateVideo($video);

if (!$result) {
    header("Location: /?success=0");
    exit(); 
}
header("Location: /?success=1");
