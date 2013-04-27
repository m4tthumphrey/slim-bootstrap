<?php

class View extends \Slim\View
{
    public function render($template)
    {
        $template .= '.php';

        return parent::render($template);
    }
}