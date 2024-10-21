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
    <link rel="icon" href="./img/tabulaLogo.png" type="image/png">
    <title>To-do List Tabula</title>
</head>

<?php
require_once '../config/database.php';
require '../src/Controllers/TarefaController.php';
require '../src/Controllers/CategoriaController.php';

try {
    $db = new PDO('mysql:host=localhost;dbname=tabula', 'root', 's3nhagener!ca');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tarefaController = new TarefaController($db);
    $categoriaController = new CategoriaController($db);

    handleRequest($tarefaController, $categoriaController);
} catch (PDOException $e) {
    echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
}

function handleRequest($tarefaController, $categoriaController) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        handlePostRequest($tarefaController, $categoriaController);
    } else {
        require '../views/inicioView.php';
        $tarefaController->index();
    }
}

function handlePostRequest($tarefaController, $categoriaController) {
    if (isset($_POST['delete_id'])) {
        $tarefaController->deletarTarefa($_POST['delete_id']);
        redirectToHome();
    } elseif (isset($_POST['id'])) {
        $tarefaController->editarTarefa();
    } elseif (isset($_POST['search-task'])) {
        $tarefaController->pesquisarTarefas($_POST['search-task']);
    } elseif (isset($_POST['task-id'])) {
        $tarefaController->marcarTarefaConcluida($_POST['task-id']);
        redirectToHome();
    } elseif (isset($_POST['uncheck-task'])) {
        $tarefaController->desmarcarConcluida($_POST['uncheck-task']);
        redirectToHome();
    } elseif (isset($_POST['nome'])) {
        $categoriaController->adicionarCategoria();
        redirectToHome();
    } elseif (isset($_POST['delete_categoria_id'])) {
        $categoriaController->deletarCategoria($_POST['delete_categoria_id']);
        redirectToHome();
    } elseif (isset($_POST['categoria_id'])) {
        $tarefaController->listarTarefasPorCategoria($_POST['categoria_id']);
    } else {
        $tarefaController->adicionarTarefa();
    }
}

function redirectToHome() {
    header('Location: /');
    exit();
}
?>

<body>

<?php $categoriaController->index(); ?>

<script src="https://kit.fontawesome.com/0ec44f1edc.js" crossorigin="anonymous"></script>
<script src="./script/script.js"></script>
<script src="./script/modal.js"></script>
<script src="./script/sidebar.js"></script>

</body>
</html>
