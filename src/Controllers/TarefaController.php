<?php

require_once __DIR__ . '/../Repositories/TarefaRepository.php';

class TarefaController {
    private $repository;

    public function __construct($db) {
        $this->repository = new TarefaRepository($db);
    }

    public function index() {
        $tarefas = $this->repository->getAll();
        require __DIR__ . '/../../views/listarTarefas.php';
    }


    public function criarTarefas($titulo, $descricao = null) { // Define $descricao como null por padrão
        $tarefa = new Tarefa();
        $tarefa->titulo = $titulo;
        $tarefa->descricao = $descricao;
        $tarefa->concluida = 0;
        return $this->repository->criarTarefa($tarefa);
    }


    public function adicionarTarefa() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titulo = $_POST['titulo'] ?? '';
            $descricao = $_POST['descricao'] ?? null;

            if (!empty($titulo)) {
                $this->criarTarefas($titulo, $descricao);
                $this->gerarJson(); // Gera o arquivo JSON após adicionar
            }

            header('Location: /');
            exit();
        }
    }



    public function listarTarefa(){
        return $this->repository->getAll();
    }

    public function editarTarefa($id, $titulo, $descricao, $concluida){
        $tarefa = new Tarefa();
        $tarefa->id = $id;
        $tarefa->titulo = $titulo;
        $tarefa->descricao = $descricao;
        $tarefa->concluida = $concluida;
        $this->repository->update($tarefa);
        $this->gerarJson(); // Gera o arquivo JSON após editar
    }

    public function deletarTarefa($id){
        $this->repository->deletarTarefa($id);
        $this->gerarJson(); // Gera o arquivo JSON após deletar
    }


    public function marcarTarefaConcluida($id) {
        return $this->repository->concluirTarefa($id);
    }

    public function pesquisarTarefas($titulo) {
        return $this->repository->pesquisarPorTitulo("%$titulo%");
    }

    public function gerarJson() {
        $tarefas = $this->repository->getAll(); // Obtém todas as tarefas
        $json = json_encode($tarefas, JSON_PRETTY_PRINT); // Converte para JSON

        $filePath = __DIR__ . '/../../data/tarefas.json';

        // Salva o JSON no arquivo
        file_put_contents($filePath, $json);
    }



}
