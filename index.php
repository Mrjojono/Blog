<?php

require('./src/controllers/userscontrollers.php');
require('./src/controllers/homepagecontrollers.php');

// Exemple de routage manuel
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'news'; // Par défaut : homepage
$action = isset($_GET['action']) ? $_GET['action'] : 'news'; // Par défaut : homepage

$controller = null;
if ($controllerName === 'login') {
    $controller = new userscontrollers();
} elseif ($controllerName === 'homepage') {
    $controller = new homepageControllers();
} elseif ($controllerName === 'news') {
    $controller = new newsControllers();
}
else {
    echo "controller non trouvés";
    exit;
}

// Vérifie si la méthode (action) existe dans le contrôleur
if (method_exists($controller, $action)) {
    // Gestion des paramètres passés à l'action
    $id_user = isset($_GET['id_user']) ? $_GET['id_user'] : null;
    $postData = $_POST;

    // Appelle dynamiquement l'action avec les paramètres
    if (!empty($id_user)) {
        $controller->$action($id_user);
    } else {
        $controller->$action($postData);
    }
} else {
    echo "Action non trouvé";
}