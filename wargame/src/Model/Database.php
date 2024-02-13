<?php
namespace App\Model;

use PDO;

class Database {
    private static $instance;
    private $connection;

    private function __construct() 
    {
        // connexion à la DB
        $this->connection = new PDO('mysql:host=localhost; dbname=wargame', 'root', 'root');
    }
    
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

}