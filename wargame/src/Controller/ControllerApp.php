<?php
namespace App\Controller;

class ControllerApp {
    protected function render($view, $data = []) {
        // chemin vers la vue
        $viewPath = '../views/' . $view . '.php';

        // on vérifie si le fichier vue existe
        if (file_exists($viewPath)) {
            // on extrait les données pour avoir accés dans la vue
            extract($data);

            // on inclut la vue
            require $viewPath;
        } else {
            // On génére un message d'erreur si la vue n'est pas trouvée
            echo "Erreur: Vue '$view' non trouvée.";
        }
    }
}