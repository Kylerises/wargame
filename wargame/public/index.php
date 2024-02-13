<?php
// inclus l'autoload
require_once '../vendor/autoload.php';

// inclus le fichier de config de routes
require_once '../app/routes.php';

// on fait correspondre
$match = $router->match();

// On vérifie si la chemin est trouvé
if ($match && is_callable($match['target'])) {
    // On appelle la méthode associé au controller
    call_user_func_array($match['target'], $match['params']);
} else {
    // On affiche une erreur 404 en cas de chemin non trouvé
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "404 Not Found";
}

?>

Test