<?php

namespace Project\MyPlayer\Model\Helper;

trait FlashMessageTrait
{
    private function addErrorMessage(string $msg): void
    {
        $_SESSION["error_message"] = $msg;
    }
    private function addSuccessMessage(string $msg): void
    {
        $_SESSION["success_message"] = $msg;
    }
}
