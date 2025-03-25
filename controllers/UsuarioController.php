<?php
require_once 'models/Usuario.php';

class UsuarioController {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $usuarioModel = new Usuario();
            $usuario = $usuarioModel->login($email, $password);

            if ($usuario) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                header("Location: index.php?controller=tema&action=index");
            } else {
                $error = "Credenciales incorrectas.";
            }
        }

        require_once 'views/usuario/login.php';
    }

    public function registro() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $usuarioModel = new Usuario();
            $exito = $usuarioModel->registrar($nombre, $email, $password);

            if ($exito) {
                header("Location: index.php?controller=usuario&action=login");
                exit;
            } else {
                $error = "Error al registrar el usuario.";
            }
        }

        require_once 'views/usuario/registro.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?controller=usuario&action=login");
    }
}
