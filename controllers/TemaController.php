<?php
require_once 'models/Tema.php';

class TemaController {

    public function index() {
        session_start();

        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?controller=usuario&action=login");
            exit;
        }

        $temaModel = new Tema();
        $temas = $temaModel->getAll();

        require_once 'views/tema/index.php';
    }
}

