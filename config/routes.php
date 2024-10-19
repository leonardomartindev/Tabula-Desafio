<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == '/') {
    require './src/Controllers/TarefaController.php';
    // Supondo que você tenha uma conexão com o banco de dados aqui
    $db = new PDO('mysql:host=localhost;dbname=sua_base', 'root', 's3nhagener!ca');
    $controller = new TarefaController($db);
    $controller->index();
}
