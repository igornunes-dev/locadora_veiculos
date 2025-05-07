<?php

namespace controllers;

use helpers\View;

class HomeController
{
    public function index() {
        View::render("home");
    }
}