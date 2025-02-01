<?php

namespace Project\MyPlayer\Model\Repository;

use Project\MyPlayer\Model\Entity\User;
use PDO;

class UserRepository
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function selectUser(string $email): ?User
    {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User(
            $user["id"],
            $user["email"],
            $user["password"],
        );
    }

    public function createUser(string $email, string $password): bool
    {
        $passwordHash = password_hash($password, PASSWORD_ARGON2ID);
        $query = "INSERT INTO users (email, password) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $passwordHash);
        return $stmt->execute();
    }

    private function reHashPassword(string $password, int $id): void
    {
        $query = "UPDATE users SET password = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, password_hash($password, PASSWORD_ARGON2ID));
        $stmt->bindValue(2, $id);
        $stmt->execute();
    }
}
