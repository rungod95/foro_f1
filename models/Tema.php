<?php
require_once 'config/database.php';

class Tema {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        $sql = "SELECT t.id_tema, t.titulo, t.descripcion, t.fecha_creacion, u.nombre AS autor
                FROM temas t
                JOIN usuarios u ON t.id_usuario = u.id_usuario
                ORDER BY t.fecha_creacion DESC";

        $result = $this->db->query($sql);
        return $result;
    }
    public function save($titulo, $descripcion, $id_usuario, $categoria) {
        $stmt = $this->db->prepare("INSERT INTO temas (titulo, descripcion, id_usuario, categoria) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            die("Error en prepare: " . $this->db->error);
        }

        $stmt->bind_param("ssis", $titulo, $descripcion, $id_usuario, $categoria);
        return $stmt->execute();
    }

    public function getById($id_tema) {
        $stmt = $this->db->prepare("SELECT t.*, u.nombre AS autor 
                                FROM temas t 
                                JOIN usuarios u ON t.id_usuario = u.id_usuario 
                                WHERE t.id_tema = ?");
        $stmt->bind_param("i", $id_tema);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function delete($id_tema) {
        $stmt = $this->db->prepare("DELETE FROM temas WHERE id_tema = ?");
        $stmt->bind_param("i", $id_tema);
        return $stmt->execute();
    }
    public function getByUsuario($id_usuario) {
        $stmt = $this->db->prepare("SELECT * FROM temas WHERE id_usuario = ? ORDER BY fecha_creacion DESC");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        return $stmt->get_result();
    }
    public function getByCategoria($categoria) {
        $stmt = $this->db->prepare("SELECT * FROM temas WHERE categoria = ? ORDER BY fecha_creacion DESC");
        $stmt->bind_param("s", $categoria);
        $stmt->execute();
        return $stmt->get_result();
    }

}
