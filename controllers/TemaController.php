<?php
require_once 'models/Tema.php';

class TemaController {

    public function index() {
        require_once 'models/Tema.php';
        $temaModel = new Tema();

        $categoria = $_GET['categoria'] ?? null;

        if ($categoria && $categoria !== 'Todos') {
            $temas = $temaModel->getByCategoria($categoria);
        } else {
            $temas = $temaModel->getAll();
        }

        require_once 'views/tema/index.php';
    }
    public function crear() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?controller=usuario&action=login");
            exit;
        }

        require_once 'views/tema/crear.php';
    }

    public function guardar() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?controller=usuario&action=login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $categoria = $_POST['categoria']; // <-- CORRECTO
            $id_usuario = $_SESSION['usuario']['id_usuario'];

            $temaModel = new Tema();
            $exito = $temaModel->save($titulo, $descripcion, $id_usuario, $categoria); // <-- OK

            if ($exito) {
                header("Location: index.php?controller=tema&action=index");
                exit;
            } else {
                $error = "Error al guardar el tema.";
                require_once 'views/tema/crear.php';
            }
        }
    }

    public function ver() {
        session_start();
        if (!isset($_GET['id'])) {
            header("Location: index.php?controller=tema&action=index");
            exit;
        }

        $id_tema = intval($_GET['id']);

        require_once 'models/Tema.php';
        require_once 'models/Comentario.php';

        $temaModel = new Tema();
        $tema = $temaModel->getById($id_tema);

        $comentarioModel = new Comentario();
        $comentarios = $comentarioModel->getByTema($id_tema);

        require_once 'views/tema/ver.php';
    }
    public function eliminar() {
        session_start();
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
            header("Location: index.php?controller=usuario&action=login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_tema = intval($_POST['id_tema']);

            require_once 'models/Tema.php';
            $temaModel = new Tema();
            $temaModel->delete($id_tema);
        }

        header("Location: index.php?controller=tema&action=index");
        exit;
    }





}

