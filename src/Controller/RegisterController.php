<?php

namespace Project\MyPlayer\Controller;

use Project\MyPlayer\Model\Helper\FlashMessageTrait;
use Project\MyPlayer\Model\Repository\UserRepository;
use League\Plates\Engine;

class RegisterController implements Controller
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

            if (!is_null($user)) {
                $this->addErrorMessage("Este usuário já foi cadastrado");
                header("Location: /register");
                exit();
            }

            $result = $this->repository->createUser($email, $password);
            if (!$result) {
                $this->addErrorMessage("Não foi possível criar o usuário");
                header("Location: /register");
                exit();
            }

            $this->addSuccessMessage("Seu usuário foi criado");
            header("Location: /login");
            exit();
        }

        if (array_key_exists("authenticated", $_SESSION)) {
            header("Location: /");
            exit();
        }

        echo $this->template->render("register");
        
    }
}
