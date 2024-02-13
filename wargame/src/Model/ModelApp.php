<?php
namespace App\Model;

class ModelApp {
    
   protected $db;
   protected $connection;

   protected function db()
   {
      $db = Database::getInstance();

      return $this->connection = $db->getConnection();
   }

}