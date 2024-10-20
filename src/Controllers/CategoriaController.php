<?php

require_once __DIR__ . '/../Repositories/CategoriaRepository.php';

class CategoriaController {
    private $repository;

    public function __construct($db) {
        $this->repository = new CategoriaRepository($db);
    }

    public function index() {
        $categorias = $this->repository->getAll();
        require __DIR__ . '/../../views/sidebarView.php';
    }

    public function criarCategoria($nome) {
        $categoria = new Categoria();
        $categoria->nome = $nome;
        return $this->repository->criarCategoria($categoria);
    }

    public function adicionarCategoria() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];  // O input do formulário tem o name 'nome'

            if (!empty($nome)) {
                $this->criarCategoria($nome);  // Chama a função para criar a categoria
                header('Location: /categorias');  // Redireciona de volta para a lista de categorias
                exit();
            }
        }
    }


    public function deletarCategoria($id) {
        $this->repository->deletarCategoria($id);
    }

}
