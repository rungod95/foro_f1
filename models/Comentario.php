<?php

require_once 'config/database.php';

class Comentario
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getByTema($id_tema)
    {
        $stmt = $this->db->prepare("SELECT c.*, u.nombre AS autor 
                                    FROM comentarios c 
                                    JOIN usuarios u ON c.id_usuario = u.id_usuario 
                                    WHERE c.id_tema = ? 
                                    ORDER BY c.fecha ASC");
        $stmt->bind_param("i", $id_tema);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function save($contenido, $id_usuario, $id_tema)
    {
        $stmt = $this->db->prepare("INSERT INTO comentarios (contenido, id_usuario, id_tema) VALUES (?, ?, ?)");
        return $stmt->execute([$contenido, $id_usuario, $id_tema]);
    }
    public function getById($id_comentario) {
        $stmt = $this->db->prepare("SELECT * FROM comentarios WHERE id_comentario = ?");
        $stmt->bind_param("i", $id_comentario);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function delete($id_comentario) {
        $stmt = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario = ?");
        $stmt->bind_param("i", $id_comentario);
        return $stmt->execute();
    }

    public function getByUsuario($id_usuario) {
        $stmt = $this->db->prepare("SELECT c.*, t.titulo 
                                FROM comentarios c
                                JOIN temas t ON c.id_tema = t.id_tema
                                WHERE c.id_usuario = ?
                                ORDER BY c.fecha ASC");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function update($id_comentario, $contenido) {
        $stmt = $this->db->prepare("UPDATE comentarios SET contenido = ? WHERE id_comentario = ?");
        $stmt->bind_param("si", $contenido, $id_comentario);
        return $stmt->execute();
    }





}
