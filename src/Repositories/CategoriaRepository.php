<?php

require_once __DIR__ . '/../Models/Categoria.php';

class CategoriaRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function criarCategoria(Categoria $categoria) {
        $query = "INSERT INTO categorias (nome) VALUES (:nome)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nome', $categoria->nome);
        return $stmt->execute();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM categorias");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletarCategoria($id) {
        $query = "DELETE FROM categorias WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
