<?php

namespace helpers;

class View
{
    public static function render(string $view)
    {
        $view = __DIR__ . "/../views/" . $view . ".php";
        require $view;
    }
}