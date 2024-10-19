<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == '/') {
    require './src/Controllers/TarefaController.php';
    $db = new PDO('mysql:host=localhost;dbname=sua_base', 'root', 's3nhagener!ca');
    $controller = new TarefaController($db);
    $controller->index();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require './src/Controllers/TarefaController.php';
    $db = new PDO('mysql:host=localhost;dbname=sua_base', 'root', 's3nhagener!ca');
    $controller = new TarefaController($db);
    $controller->adicionarTarefa();
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == '/') {
    require './src/Controllers/TarefaController.php';
    $db = new PDO('mysql:host=localhost;dbname=sua_base', 'root', 's3nhagener!ca');
    $controller = new TarefaController($db);
    $controller->index();
}
