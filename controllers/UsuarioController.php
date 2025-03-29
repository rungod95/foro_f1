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
                // Enviar correo de bienvenida
                $asunto = "¡Bienvenido al Foro de Fórmula 1!";
                $mensaje = "Hola $nombre,\n\nGracias por registrarte en el foro. ¡Esperamos tus aportes en los debates de F1!\n\n- El equipo del foro";
                $cabeceras = "From: foro@f1local.com";

                mail($email, $asunto, $mensaje, $cabeceras);

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

    public function historial() {
        session_start();

        // Ver usuario desde parámetro o desde sesión
        $id_usuario = $_GET['id'] ?? $_SESSION['usuario']['id_usuario'];

        require_once 'models/Tema.php';
        require_once 'models/Comentario.php';

        $temaModel = new Tema();
        $comentarioModel = new Comentario();

        $temas = $temaModel->getByUsuario($id_usuario);
        $comentarios = $comentarioModel->getByUsuario($id_usuario);

        require_once 'views/usuario/historial.php';
    }

}
