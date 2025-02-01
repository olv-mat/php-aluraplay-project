<?php

namespace Project\MyPlayer\Model\Entity;

class User
{
    private ?int $id;
    private string $email;
    private string $password;

    public function __construct(?int $id, string $email, string $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        if (is_null($this->id)) {
            $this->id = $id;
        }
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password; 
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}
