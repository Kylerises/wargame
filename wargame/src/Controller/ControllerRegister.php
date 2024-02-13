<?php
namespace App\Controller;

use App\Model\ModelRegister;

class ControllerRegister {

    public function showRegistrationForm() {
        // on affiche la vue avec la fonction render
        $this->render('register');
    }

    public function registerUser() {
        // on récupère les données entrée par l'utilisateur
        $username = htmlentities($_POST['username']);
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);

        // on l'ajoute dans la DB
        $userModel = new ModelRegister();
        $userModel->addUser($username, $email, $password);

        // on le redirige vers index TODO
        header("Location: index.php"); 
        exit();
    }

    private function render($view) {
        require_once __DIR__ . '/../View/' . $view . '.php';
    }
}
