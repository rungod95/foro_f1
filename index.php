<?php
require_once 'config/database.php';
require_once 'controllers/TemaController.php';
require_once 'controllers/UsuarioController.php';

// Enrutamiento simple
$controlador = $_GET['controller'] ?? 'usuario';
$accion = $_GET['action'] ?? 'login';

if ($controlador == 'tema') {
    $controlador = new TemaController();
} else {
    $controlador = new UsuarioController();
}

$controlador->$accion();
