<?php

$dbPath = __DIR__ . "/db.sqlite";
$conn = new PDO("sqlite:$dbPath");

$query = "INSERT INTO videos (url, title) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bindValue(1, $_POST["url"]);
$stmt->bindValue(2, $_POST["titulo"]);
$result = $stmt->execute();

if ($result === false) {
    header("Location: /index.php?success=0");
} else {
    header("Location: /index.php?success=1");
}
