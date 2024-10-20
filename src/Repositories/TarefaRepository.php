<?php

require_once __DIR__ . '/../Models/Tarefa.php';

class TarefaRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function criarTarefa(Tarefa $tarefa) {
        $query = "INSERT INTO tarefas (titulo, descricao, concluida, categoria_id) VALUES (:titulo, :descricao, :concluida, :categoria_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':titulo', $tarefa->titulo);
        $stmt->bindParam(':descricao', $tarefa->descricao);
        $stmt->bindParam(':concluida', $tarefa->concluida);
        $stmt->bindParam(':categoria_id', $tarefa->categoria);
        return $stmt->execute();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM tarefas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCategories()
    {
        $stm = $this->db->prepare("SELECT * FROM categorias");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pesquisarPorTitulo($title) {
        $query = "SELECT * FROM tarefas WHERE titulo LIKE :title";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTarefasPorCategoria($categoriaId) {
        $stmt = $this->db->prepare('SELECT * FROM tarefas WHERE categoria_id = :categoria_id');
        $stmt->bindParam(':categoria_id', $categoriaId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function update(Tarefa $tarefa) {
        $query = "UPDATE tarefas SET titulo = :titulo, descricao = :descricao, concluida = :concluida, categoria_id = :categoria_id WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':titulo', $tarefa->titulo);
        $stmt->bindParam(':descricao', $tarefa->descricao);
        $stmt->bindParam(':concluida', $tarefa->concluida);
        $stmt->bindParam(':categoria_id', $tarefa->categoria);
        $stmt->bindParam(':id', $tarefa->id);
        return $stmt->execute();
    }

    public function deletarTarefa($id) {
        $query = "DELETE FROM tarefas WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function concluirTarefa($id) {
        $query = "UPDATE tarefas SET concluida = 1 WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function desmarcarTarefaConcluida($id) {
        $query = "UPDATE tarefas SET concluida = 0 WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
