<?php

namespace Project\AluraPlay\Controller;

use PDO;

class LoginController implements Controller
{
    private PDO $conn;
    private string $requestMethod;

    public function __construct(PDO $conn, string $requestMethod)
    {
        $this->conn = $conn;
        $this->requestMethod = $requestMethod;
    }

    public function requestProcessing(): void
    {
        if ($this->requestMethod == "POST") {
            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password");

            $query = "SELECT * FROM users WHERE email = ?";
            $stmt = $this->conn->query($query);
            $stmt->bindValue(1, $email);
            $stmt->execute();
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $userData["password"]) ?? "") {
                $_SESSION["authenticated"] = true;
                header("Location: /");
            } else {
                header("Location: /login?sucess=0");
            }
        }

        if (array_key_exists("authenticated", $_SESSION)) {
            header("Location: /");
        }

        require_once __DIR__ . "/../../views/login.php";
    }
}
