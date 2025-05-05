<?php
require_once 'models/Usuario.php';

class AdminController {

    public function usuarios() {
        session_start();
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
            header("Location: index.php?controller=usuario&action=login");
            exit;
        }

        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->getAll();
        require_once 'views/admin/usuarios.php';
    }

    public function cambiarRol() {
        session_start();
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
            header("Location: index.php?controller=usuario&action=login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usuario = intval($_POST['id_usuario']);
            $nuevo_rol = $_POST['rol'];

            $usuarioModel = new Usuario();
            $usuarioModel->actualizarRol($id_usuario, $nuevo_rol);
        }

        header("Location: index.php?controller=admin&action=usuarios");
        exit;
    }
    public function eliminarUsuario()
    {
        session_start();

        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
            header("Location: index.php?controller=usuario&action=login");
            exit;
        }

        $id_usuario = intval($_POST['id_usuario']);

        // Evitar que el admin se borre a sí mismo
        if ($id_usuario == $_SESSION['usuario']['id_usuario']) {
            header("Location: index.php?controller=admin&action=usuarios");
            exit;
        }

        $usuarioModel = new Usuario();
        $usuarioModel->eliminar($id_usuario);

        header("Location: index.php?controller=admin&action=usuarios");
        exit;
    }
}
