<?php
// Inclusion de l'autoload pour charger les classes automatiquement
require_once __DIR__ . '/../vendor/autoload.php';

// Création de l'instance du routeur
$router = new AltoRouter();

// Définition des routes
$router->map('GET', '/', 'ControllerHome#index'); // TODO
$router->map('GET', '/about', 'ControllerAbout#index'); // TODO

// Route spécifique pour afficher le formulaire d'inscription
$router->map('GET', '/register', function() {
    // Inclure la vue pour l'inscription depuis le dossier public
    require_once __DIR__ . '/../public/register.php';
});

// Route pour traiter la soumission du formulaire d'inscription
$router->map('POST', '/register', 'ControllerRegister#insertUser');

// Correspondance de la requête avec une route
$match = $router->match();

// Exécution de la route correspondante
if ($match) {
    // Extraction des informations de la route
    list($controllerName, $action) = explode('#', $match['target']);
    $controllerName = 'App\\Controller\\' . $controllerName;
    
    // Création de l'instance du contrôleur
    $controller = new $controllerName(); //TODO
    
    // Appel de la méthode du contrôleur correspondant à l'action de la route
    call_user_func_array([$controller, $action], $match['params']);
} else {
    // Si aucune route correspondante n'est trouvée, afficher une erreur 404
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo 'Page not found';
}
