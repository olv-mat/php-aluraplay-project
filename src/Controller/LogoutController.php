<?php

namespace Project\MyPlayer\Controller;

class LogoutController implements Controller
{
    public function requestProcessing(): void
    {
        session_destroy();
        header("Location: /login");
        exit();
    }
}
