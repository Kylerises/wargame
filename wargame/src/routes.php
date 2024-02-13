<?php
// On crée une instance dans la variable $router
$router = new AltoRouter();

// On définit les chemins
$router->map('GET', '/register', function() {
    // Inclure la vue pour l'inscription
    require_once __DIR__ . '/../src/view/register.php';
});