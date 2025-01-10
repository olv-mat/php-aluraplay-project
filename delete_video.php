<?php

use Project\AluraPlay\Repository\VideoRepository;

$dbPath = __DIR__ . "/db.sqlite";
$conn = new PDO("sqlite:$dbPath");

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$repository = new VideoRepository($conn);
$repository->deleteVideo($id);

if (!$result) {
    header("Location: /?success=0");
}
header("Location: /?success=1");
