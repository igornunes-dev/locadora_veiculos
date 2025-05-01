<?php

namespace helpers;

class Redirect
{
    public static function redirect($url): void {
        header("Location: /$url");
        exit;
    }
}