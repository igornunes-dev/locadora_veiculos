<?php

namespace controllers;

use helpers\Redirect;
use helpers\View;
use models\UserLogin;
use services\UsuarioService;

class UsuarioLoginController
{
    public function index() {
        View::render("login");
    }

    public function store() {
        $emailSanitizado = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senhaSanitizado = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $user = new UserLogin($emailSanitizado, $senhaSanitizado);
        $repo = new UsuarioService();
        if($repo->loginUser($user)) {
            Redirect::redirect("home");
        } else {
            Redirect::redirect("login");
        }
    }
}