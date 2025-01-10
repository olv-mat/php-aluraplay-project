<?php

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;

$dbPath = __DIR__ . "/db.sqlite";
$conn = new PDO("sqlite:$dbPath");

$url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST, "titulo");
if (!$url || !$title) {
    header("Location: /?success=0");
    exit();
}

$video = new Video(null, $url, $title);
$repository = new VideoRepository($conn);
$result = $repository->insertVideo($video);

if (!$result) {
    header("Location: /?success=0");
    exit();
}
header("Location: /?success=1");
