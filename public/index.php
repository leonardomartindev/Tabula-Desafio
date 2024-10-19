<?php
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
        <div class="title-date">
            <h1>Todo List</h1>
            <span id="actual-date"></span>
        </div>
        <form action="" id="search-form">
            <div class="input-container">
                <input id="search-task" type="text" placeholder="Nome da tarefa">
                <i class="fas fa-search"></i>
            </div>
        </form>
    </header>
    <main>
        <div class="container-tasks-pending">
            <div class="task-pending">
                <div class="input-name">
                    <input type="checkbox" id="task" class="custom-checkbox">
                    <label for="task">Fazer desafio da Tabula</label>
                </div>
                <div class="icons-container">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <i class="fa-regular fa-trash-can"></i>
                </div>
            </div>
            <div class="task-pending">
                <div class="input-name">
                    <input type="checkbox" id="task" class="custom-checkbox">
                    <label for="task">Fazer desafio da Tabula</label>
                </div>
                <div class="icons-container">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <i class="fa-regular fa-trash-can"></i>
                </div>
            </div>
            <div class="task-pending">
                <div class="input-name">
                    <input type="checkbox" id="task" class="custom-checkbox">
                    <label for="task">Fazer desafio da Tabula</label>
                </div>
                <div class="icons-container">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <i class="fa-regular fa-trash-can"></i>
                </div>
            </div>
            <div class="task-pending">
                <div class="input-name">
                    <input type="checkbox" id="task" class="custom-checkbox">
                    <label for="task">Fazer desafio da Tabula</label>
                </div>
                <div class="icons-container">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <i class="fa-regular fa-trash-can"></i>
                </div>
            </div>
        </div>

        <div class="container-tasks-finished">
            <div class="show-tasks">
                <h2>Concluídas</h2>
                <i class="fa-solid fa-caret-up close open"></i>
            </div>
            <div id="container-tasks-finished" class="task-pending task-finished">
                <div class="input-name">
                    <input type="checkbox" id="2" class="custom-checkbox" checked>
                    <label for="2">Fazer desafio da Tabula</label>
                </div>
                <div class="icons-container">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <i class="fa-regular fa-trash-can"></i>
                </div>
            </div>
        </div>
        
        <div class="hide">
            <div class="modal">
                <div class="header-modal">
                    <h2>Editar Tarefa</h2>
                    <i class="fa-solid fa-xmark close-modal"></i>
                    <div class="line-divider"></div>
                </div>
                <form action="" class="edit-task-form">
                    <label for="title-task-edit">Título</label>
                    <input type="text" id="title-task-edit" placeholder="Título da tarefa">

                    <label for="description-task-edit">Descrição</label>
                    <textarea name="description-task-edit" id="description-task-edit"></textarea>

                    <div class="input-name">
                        <input type="checkbox" id="3" class="custom-checkbox">
                        <label for="3">Fazer desafio da Tabula</label>
                    </div>

                    <div class="buttons-task-edit">
                        <button class="cancel-btn">cancelar</button>
                        <button class="save-btn">salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="./script/script.js"></script>
</body>
</html>