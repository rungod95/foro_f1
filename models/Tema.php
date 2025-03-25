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
}
