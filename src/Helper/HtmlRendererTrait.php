<?php

namespace Project\AluraPlay\Helper;

trait HtmlRendererTrait
{
    
    private function renderTemplate(string $templateName, array $context=[]): string
    {
        extract($context);
        ob_start();
        $templatePath = __DIR__ . "/../../views/";
        require_once $templatePath . $templateName;
        $content = ob_get_clean();
        return $content;
    } 
}
