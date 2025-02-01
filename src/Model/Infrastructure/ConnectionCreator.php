<?php

namespace Project\MyPlayer\Model\Infrastructure;

use PDO;
use Dotenv\Dotenv;

class ConnectionCreator
{
    
    public static function createConnection(): PDO
    {
        $dotenvPath = __DIR__ . "/../../../";
        $dotenv = Dotenv::createImmutable($dotenvPath)->load();
    
        $databaseHost = $_ENV['HOST'];
        $databaseName = $_ENV['DATABASE_NAME'];
        $databaseUser = $_ENV['DATABASE_USER'];
        $databasePassword = $_ENV['DATABASE_PASSWORD'];
        $databasePath = "mysql:host=$databaseHost;dbname=$databaseName";
        
        $conn = new PDO($databasePath, $databaseUser, $databasePassword);
        return $conn;
    }
}
