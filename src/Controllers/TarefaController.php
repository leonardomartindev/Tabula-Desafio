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


    public function criarTarefas($titulo, $descricao = null) {
        $tarefa = new Tarefa();
        $tarefa->titulo = $titulo;
        $tarefa->descricao = $descricao;
        $tarefa->concluida = 0;
        return $this->repository->criarTarefa($tarefa);
    }


    public function adicionarTarefa() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'] ?? null;

            if (!empty($titulo)) {
                $this->criarTarefas($titulo, $descricao);
                $this->gerarJson();
            }

            header('Location: /');
            exit();
        }
    }

  public function editarTarefa() {
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
          $id = $_POST['id'];
          $titulo = $_POST['titulo'] ?? '';
          $descricao = $_POST['descricao'] ?? '';

          if (!empty($titulo)) {
              $tarefa = new Tarefa();
              $tarefa->id = $id;
              $tarefa->titulo = $titulo;
              $tarefa->descricao = $descricao;
              $tarefa->concluida = 0;
              $this->repository->update($tarefa);
              $this->gerarJson();
              header('Location: /');
              exit();
          }
      }
  }

    public function deletarTarefa($id){
        $this->repository->deletarTarefa($id);
        $this->gerarJson();
    }

    public function marcarTarefaConcluida($id) {
        return $this->repository->concluirTarefa($id);
    }
    public function desmarcarConcluida($id) {
        return $this->repository->desmarcarTarefaConcluida($id);
    }

    public function pesquisarTarefas($titulo) {
          $tarefas = $this->repository->pesquisarPorTitulo("%$titulo%");
          require __DIR__ . '/../../views/resultadoBusca.php';
    }

    public function gerarJson() {
        $tarefas = $this->repository->getAll();
        $json = json_encode($tarefas, JSON_PRETTY_PRINT);
        $filePath = __DIR__ . '/../../data/tarefas.json';
        file_put_contents($filePath, $json);
    }



}
