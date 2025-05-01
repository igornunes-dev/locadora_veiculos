<?php

namespace controllers;

use helpers\View;

class UsuarioLoginController
{
    public function index() {
        View::render("login");
    }
}