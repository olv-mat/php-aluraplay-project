<?php

namespace Project\MyPlayer\Model\Infrastructure;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        $dbPath = __DIR__ . "/../../../db.sqlite";
        $conn = new PDO("sqlite:$dbPath");
        return $conn;
    }
}
