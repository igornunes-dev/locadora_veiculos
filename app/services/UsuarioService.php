<?php

namespace services;

use database\Database;
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
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "email" => $user->getEmail()
        ]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
}