<?php

use App\Model\ModelRegister;
// on inclus le model
require_once 'ModelRegister.php';

// on vérifie si le formulaire à été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // on récupère les données du formulaires
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // on ajoute l'utilisateur dans la base de données
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
    $userModel = new ModelRegister($db);
    $userModel->addUser($username, $email, $password);

    // on redirige l'utilisateur vers la page index
    header("Location: index.php");
    exit();
}

// on affiche la vue
$message = ''; // on affiche un message en cas de succés ou d'une erreur
require_once 'register.php';
