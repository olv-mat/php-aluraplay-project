<?php

$dbPath = __DIR__ . "/db.sqlite";
$conn = new PDO("sqlite:$dbPath");

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$query = "DELETE FROM videos WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bindValue(1, $id, PDO::PARAM_INT);
$result = $stmt->execute();

if (!$result) {
    header("Location: /?success=0");
}
header("Location: /?success=1");
