<?php
require_once 'models/Comentario.php';

class ComentarioController {

    public function guardar() {
        session_start();
        if (!isset($_SESSION['usuario']) || $_SERVER['REQUEST_METHOD'] != 'POST') {
            header("Location: index.php?controller=usuario&action=login");
            exit;
        }

        $contenido = $_POST['contenido'];
        $id_tema = intval($_POST['id_tema']);
        $id_usuario = $_SESSION['usuario']['id_usuario'];

        $comentarioModel = new Comentario();
        $comentarioModel->save($contenido, $id_usuario, $id_tema);

        header("Location: index.php?controller=tema&action=ver&id=$id_tema");
    }

    public function eliminar() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_comentario = intval($_POST['id_comentario']);
            $id_tema = intval($_POST['id_tema']);

            require_once 'models/Comentario.php';
            $comentarioModel = new Comentario();

            // Recuperar el comentario y verificar permiso
            $comentario = $comentarioModel->getById($id_comentario);
            $usuario = $_SESSION['usuario'];

            if (
                $comentario &&
                ($usuario['id_usuario'] == $comentario['id_usuario'] || $usuario['rol'] == 'admin')
            ) {
                $comentarioModel->delete($id_comentario);
            }
        }

        header("Location: index.php?controller=tema&action=ver&id=$id_tema");
        exit;
    }

    public function editar() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?controller=usuario&action=login");
            exit;
        }

        $id_comentario = intval($_GET['id']);
        $id_tema = intval($_GET['tema']);

        require_once 'models/Comentario.php';
        $comentarioModel = new Comentario();
        $comentario = $comentarioModel->getById($id_comentario);

        if (!$comentario || $_SESSION['usuario']['id_usuario'] != $comentario['id_usuario']) {
            die('Acceso denegado');
        }

        require 'views/comentario/editar.php';
    }

    public function actualizar() {
        session_start();
        if (!isset($_SESSION['usuario']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?controller=usuario&action=login");
            exit;
        }

        $id_comentario = intval($_POST['id_comentario']);
        $id_tema = intval($_POST['id_tema']);
        $contenido = $_POST['contenido'];

        require_once 'models/Comentario.php';
        $comentarioModel = new Comentario();

        // Verificar autor
        $comentario = $comentarioModel->getById($id_comentario);
        if ($_SESSION['usuario']['id_usuario'] != $comentario['id_usuario']) {
            die('No autorizado');
        }

        $comentarioModel->update($id_comentario, $contenido);

        header("Location: index.php?controller=tema&action=ver&id=$id_tema");
        exit;
    }



}
