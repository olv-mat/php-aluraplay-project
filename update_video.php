<?php

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST, "titulo");

if (!$id || !$url || !$title) {
    header("Location: index.php?success=0");
    exit();   
}

$dbPath = __DIR__ . "/db.sqlite";
$conn = new PDO("sqlite:$dbPath");

$query = "UPDATE videos SET url = ?, title = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bindValue(1, $url);
$stmt->bindValue(2, $title);
$stmt->bindValue(3, $id, PDO::PARAM_INT);
$result = $stmt->execute();

if (!$result) {
    header("Location: index.php?success=0");
    exit(); 
}
header("Location: index.php?success=1");
