<?php

require('./src/controllers/userscontrollers.php');
require('./src/controllers/homepagecontrollers.php');
require('./src/controllers/newscontrollers.php');
require('./src/controllers/postsControllers.php');


// Exemple de routage manuel
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'homepage'; // Par défaut : homepage
$action = isset($_GET['action']) ? $_GET['action'] : 'homepage'; // Par défaut : homepage

$controller = null;
if ($controllerName === 'user') {
    $controller = new Userscontrollers();
} elseif ($controllerName === 'homepage') {
    $controller = new homepageControllers();
} elseif($controllerName === 'posts'){
    $controller = new postsControllers();
} elseif($controllerName === 'news'){
    $controller = new newscontrollers();
}
else {
    echo "controller non trouvés";
    exit;
}

// Vérifie si la méthode (action) existe dans le contrôleur
if (method_exists($controller, $action)) {
    // Gestion des paramètres passés à l'action
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $postData = $_POST;

    // Appelle dynamiquement l'action avec les paramètres
    if (!empty($id)) {
        $controller->$action($id);
    } else {
        $controller->$action($postData);
    }
} else {
    echo "Action non trouvé";
}