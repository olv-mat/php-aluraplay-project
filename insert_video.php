<?php

$dbPath = __DIR__ . "/db.sqlite";
$conn = new PDO("sqlite:$dbPath");

$url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST, "titulo");
if (!$url || !$title) {
    header("Location: /index.php?success=0");
    exit();
}

$query = "INSERT INTO videos (url, title) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bindValue(1, $url);
$stmt->bindValue(2, $title);
$result = $stmt->execute();

if (!$result) {
    header("Location: /index.php?success=0");
    exit();
}
header("Location: /index.php?success=1");
