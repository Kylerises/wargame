<?php
namespace App\Model;

class ModelRegister extends ModelApp {

    public function addUser($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$username, $email, $hashedPassword]);
    }
}