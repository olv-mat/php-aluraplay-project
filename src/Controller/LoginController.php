<?php

namespace Project\MyPlayer\Controller;

use Project\MyPlayer\Model\Helper\FlashMessageTrait;
use Project\MyPlayer\Model\Repository\UserRepository;
use League\Plates\Engine;

class LoginController implements Controller
{
    use FlashMessageTrait;

    private UserRepository $repository;
    private string $requestMethod;
    private Engine $template;

    public function __construct(UserRepository $repository, string $requestMethod, Engine $template)
    {
        $this->repository = $repository;
        $this->requestMethod = $requestMethod;
        $this->template = $template;
    }

    public function requestProcessing(): void
    {
        if ($this->requestMethod == "POST") {

            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password");
            $user = $this->repository->selectUser($email);

            if (is_null($user)) {
                $this->addErrorMessage("Usuário inexistente");
                header("Location: /login");
                exit();
            }

            if (password_verify($password, $user->getPassword())) {
                if (password_needs_rehash($user->getPassword(), PASSWORD_ARGON2ID)) {
                    $this->repository->reHashPassword($password, $user->getId());
                }
                $_SESSION["authenticated"] = true;
                header("Location: /");
                exit();
            } else {
                $this->addErrorMessage("Usuário ou senha inválidos");
                header("Location: /login");
                exit();
            }
        }

        if (array_key_exists("authenticated", $_SESSION)) {
            header("Location: /");
            exit();
        }

        echo $this->template->render("login");
        
    }
}
