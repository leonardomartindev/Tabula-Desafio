<?php

require_once __DIR__ . '/../Repositories/TarefaRepository.php';

class TarefaController {
    private $repository;

    public function __contruct($db) {
        $this->repository = new TarefaRepository($db);
    }

    public function criarTarefas($titulo, $descricao) {
        $tarefa = new Tarefa();
        $tarefa->titulo = $titulo;
        $tarefa->descricao = $descricao;
        $tarefa->concluida = 0;
        return $this->repository->criarTarefa($tarefa);
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
        return $this->repository->update($tarefa);
    }

    public function deletarTarefa($id){
        return $this->repository->deletarTarefa($id);
    }

    public function marcarTarefaConcluida($id) {
        return $this->repository->concluirTarefa($id);
    }

    public function pesquisarTarefas($titulo) {
        return $this->repository->pesquisarPorTitulo("%$titulo%");
    }


}
