<?php

namespace services;

use database\Database;
use models\UserLogin;
use models\UserModel;

class UsuarioService
{
    private $pdo;

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    public function saveUser(UserModel $user): bool
    {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            "nome" => $user->getNome(),
            "email" => $user->getEmail(),
            "senha" => $user->getPassword()
        ]);
    }

    public function loginUser(UserLogin $user): bool
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "email" => $user->getEmail()
        ]);
        $usuario = $stmt->fetch(\PDO::FETCH_OBJ);

        if ($usuario && ($user->getSenha() == $usuario->senha)) {
            return true;
        }
        // Login inválido
        return false;
    }
}