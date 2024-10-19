<?php
// Inclua o arquivo de conexão com o banco de dados (ajuste o caminho se necessário)
require_once '../config/database.php'; // Certifique-se de ter o arquivo de conexão com o banco

// Inclua o controlador de tarefas
require '../src/Controllers/TarefaController.php';

// Crie uma instância do controlador, passando a conexão do banco de dados
$controller = new TarefaController($db);
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
</body>
</html>
