<?php

require_once __DIR__ . '/../Models/Tarefa.php';

class TarefaRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create(Tarefa $tarefa) {
        $query = "INSERT INTO tarefas (titulo, descricao, concluida) VALUES (:titulo, :descricao, :concluida)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':titulo', $tarefa->titulo);
        $stmt->bindParam(':descricao', $tarefa->descricao);
        $stmt->bindParam(':concluida', $tarefa->concluida);
        return $stmt->execute();
    }
    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM tarefas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todas as tarefas como array associativo
    }

    public function pesquisarPorTitulo($title) {
        $query = "SELECT * FROM tarefas WHERE titulo LIKE :title ORDER BY concluida ASC, data_criacao DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Tarefa');
    }

    public function update(Tarefa $tarefa) {
        $query = "UPDATE tarefas set titulo = :titulo, descricao = :descricao, concluida = :concluida WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':titulo', $tarefa->titulo);
        $stmt->bindParam(':descricao', $tarefa->descricao);
        $stmt->bindParam(':concluida', $tarefa->concluida);
        $stmt->bindParam(':id', $tarefa->id);
        return $stmt->execute();
    }

    public function deletarTarefa($id) {
        $query = "DELETE FROM tarefas WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function concluirTarefa($id) {
        $query = "UPDATE tarefas set concluida = 1 WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }


}
