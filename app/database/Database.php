<?php
namespace database;
class Database
{
    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $pdo;

    public function __construct(){
        $this->dbname = "locadora_veiculo";
        $this->host = "127.0.0.1";
        $this->user = "root";
        $this->pass = "root";

        try {
            $this->pdo = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getConnection(){
        return $this->pdo;
    }
}