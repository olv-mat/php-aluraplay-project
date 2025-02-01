<?php

namespace Project\AluraPlay\Infrastructure;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        $dbPath = __DIR__ . "/../../db.sqlite";
        $conn = new PDO("sqlite:$dbPath");
        return $conn;
    }
}
