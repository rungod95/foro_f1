<?php
require_once 'config/database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function registrar($nombre, $email, $password) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }
        if (!$stmt->execute([$nombre, $email, $password_hash])) {
            die("Error en execute: " . $stmt->error);
        }
        return true;
    }


    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario;
        }

        return false;
    }
    public function getAll() {
        $result = $this->db->query("SELECT id_usuario, nombre, email, rol FROM usuarios ORDER BY nombre ASC");
        return $result;
    }

    public function actualizarRol($id_usuario, $rol) {
        $stmt = $this->db->prepare("UPDATE usuarios SET rol = ? WHERE id_usuario = ?");
        $stmt->bind_param("si", $rol, $id_usuario);
        return $stmt->execute();
    }
    public function eliminar($id_usuario) {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
        $stmt->bind_param("i", $id_usuario);
        return $stmt->execute();
    }


}
