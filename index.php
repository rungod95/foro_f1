<?php
require_once 'config/database.php';

$controllerName = $_GET['controller'] ?? 'usuario';
$action = $_GET['action'] ?? 'login';

if ($controllerName == 'tema') {
    require_once 'controllers/TemaController.php';
    $controller = new TemaController();
} elseif ($controllerName == 'comentario') {
    require_once 'controllers/ComentarioController.php';
    $controller = new ComentarioController();
} elseif ($controllerName == 'admin') {
    require_once 'controllers/AdminController.php';
    $controller = new AdminController();
} else {
    require_once 'controllers/UsuarioController.php';
    $controller = new UsuarioController();
}

$controller->$action();
