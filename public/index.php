<?php
require_once '../config/database.php';
require '../src/Controllers/TarefaController.php';

$db = new PDO('mysql:host=localhost;dbname=tabula', 'root', 's3nhagener!ca');
$controller = new TarefaController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_id'])) {
        $controller->deletarTarefa($_POST['delete_id']);
    } elseif (isset($_POST['id'])) {
        $controller->editarTarefa();
    } elseif (isset($_POST['search-task'])){
        $tarefa = $_POST['search-task'];
        $controller->pesquisarTarefas($tarefa);
    }
    elseif (isset($_POST['task-id'])) {
        $controller->marcarTarefaConcluida($_POST['task-id']);
    }
    elseif (isset($_POST['uncheck-task'])) {
        $controller->desmarcarConcluida($_POST['uncheck-task']);
    }
    else {
        $controller->adicionarTarefa();
    }
    header('Location: /');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0ec44f1edc.js" crossorigin="anonymous"></script>
    <title>ToDo List Tabula</title>
</head>
<body>

<header>
    <?php require '../Views/inicioView.php'?>
</header>

<main>
    <?php $controller->index(); ?>
</main>

<script src="./script/script.js"></script>
<script src="./script/modal.js"></script>
</body>
</html>
