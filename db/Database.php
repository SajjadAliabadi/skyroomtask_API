<?php
include "env.php";
class Database
{

    public $pdo;

    public function __construct(){
        if(!isset($this->pdo)) {
            try {
                $this->pdo = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME, DB_USER, DB_PASS);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->exec("SET CHARACTER SET utf8");
                echo "Connected successfully";
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

    }

}