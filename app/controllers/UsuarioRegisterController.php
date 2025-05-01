<?php

namespace controllers;
use helpers\Redirect;
use helpers\View;
use models\UserModel;
use services\UsuarioService;

require_once __DIR__ . "/../helpers/View.php";
require_once __DIR__ . "/../helpers/Redirect.php";
class UsuarioRegisterController
{
    public function index() {
            View::render("register");
    }

    public function store() {
        $nomeSanitizado = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $emailSanitizado = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senhaSanitizado = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $user = new UserModel($nomeSanitizado, $emailSanitizado, $senhaSanitizado);
        $repo = new UsuarioService();
        if($repo->saveUser($user)) {
            Redirect::redirect("login");
        }
    }
}