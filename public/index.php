<?php
require_once '../config/database.php';
require '../src/Controllers/TarefaController.php';
require '../src/Controllers/CategoriaController.php';

try {
    $db = new PDO('mysql:host=localhost;dbname=tabula', 'root', 's3nhagener!ca');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $controller = new TarefaController($db);
    $categoriaController = new CategoriaController($db);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Deletar Tarefa
        if (isset($_POST['delete_id'])) {
            $controller->deletarTarefa($_POST['delete_id']);
            header('Location: /');
            exit();
        }
        // Editar Tarefa
        elseif (isset($_POST['id'])) {
            $controller->editarTarefa();
        }
        // Pesquisar Tarefas
        elseif (isset($_POST['search-task'])) {
            $tarefa = $_POST['search-task'];
            $controller->pesquisarTarefas($tarefa);
        }
        // Marcar Tarefa como Concluída
        elseif (isset($_POST['task-id'])) {
            $controller->marcarTarefaConcluida($_POST['task-id']);
            header('Location: /');
        }
        // Desmarcar Tarefa Concluída
        elseif (isset($_POST['uncheck-task'])) {
            $controller->desmarcarConcluida($_POST['uncheck-task']);
            header('Location: /');

        }
        // Adicionar Categoria
        elseif (isset($_POST['nome'])) {
            $categoriaController->adicionarCategoria();
            header('Location: /');
        }
        // Deletar categoria
        elseif(isset($_POST['delete_categoria_id'])) {
            $categoriaController->deletarCategoria($_POST['delete_categoria_id']);
            header('Location: /');
        // Listar tarefas por categoria
        } elseif (isset($_POST['categoria_id'])) {
            $controller->listarTarefasPorCategoria($_POST['categoria_id']);
        }
        // Adicionar Nova Tarefa
        else {
            $controller->adicionarTarefa();
        }
    } else {
        require '../views/inicioView.php';
        $controller->index();
    }
} catch (PDOException $e) {
    echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <title>ToDo List Tabula</title>
</head>
<body>

<header>
</header>

<main>
</main>

    <?php $categoriaController->index(); ?>



<script src="https://kit.fontawesome.com/0ec44f1edc.js" crossorigin="anonymous"></script>
<script src="./script/script.js"></script>
<script src="./script/modal.js"></script>
<script src="./script/sideBar.js"></script>
</body>
</html>
