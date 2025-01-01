<?php

$dbPath = __DIR__ . "/db.sqlite";
$conn = new PDO("sqlite:$dbPath");
$conn->exec("CREATE TABLE videos (id INTEGER PRIMARY KEY, url TEXT, title TEXT)");
