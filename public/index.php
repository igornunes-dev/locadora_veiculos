<?php

use database\Database;
use routes\Routes;

require_once __DIR__ . '/../app/routes/Routes.php';
require_once __DIR__ . '/../app/database/Database.php';
require_once __DIR__ . '/../app/controllers/UsuarioRegisterController.php';
require_once __DIR__ . '/../app/models/UserModel.php';
require_once __DIR__ . '/../app/services/UsuarioService.php';
require_once __DIR__ . '/../app/controllers/UsuarioLoginController.php';

$routes = new Routes();

try {
    $database = new Database();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


$routes->addRouter("GET", "/" , [controllers\UsuarioRegisterController::class, "index"]);
$routes->addRouter("POST", "/registro/store" , [controllers\UsuarioRegisterController::class, "store"]);
$routes->addRouter("GET", "/login" , [controllers\UsuarioLoginController::class, "index"]);

$routes->run($_SERVER["REQUEST_URI"]);
