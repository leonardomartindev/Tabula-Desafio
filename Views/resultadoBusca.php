<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/style.css">
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
    <div class="container-tasks-pending">
        <form action="/" method="POST" class="add-task-form">
            <input type="text" name="titulo" class="name-add-task-input" placeholder="Adicionar nova tarefa" required>
            <div class="form-data-fields">
                <input type="text" name="descricao" class="description-add-task-input" placeholder="Descrição">
                <div class="divider-add-task-form"></div>
                <div class="container-buttons-add-task">
                    <button type="button" class="cancel-add-task">cancelar</button>
                    <button type="submit" class="save-add-task">salvar</button>
                </div>
            </div>
        </form>

        <?php foreach ($tarefas as $tarefa): ?>
            <?php if (!$tarefa['concluida']): ?>
                <div class="task-pending">
                    <div class="input-name">
                        <input type="checkbox" id="task-<?= $tarefa['id'] ?>" class="custom-checkbox">
                        <label for="task-<?= htmlspecialchars($tarefa['id']) ?>"><?= htmlspecialchars($tarefa['titulo']) ?></label>
                    </div>
                    <div class="icons-container">
                   <form action="/editarTarefa" method="POST" style="display:inline;">
                       <input type="hidden" name="ids" value="<?= $tarefa['id'] ?>">
                       <i class="editar-button fa-regular fa-pen-to-square" data-id="<?= $tarefa['id'] ?>" data-description="<?= htmlspecialchars($tarefa['descricao']) ?>"></i>
                   </form>


                       <form action="/deletarTarefa" method="POST" style="display:inline;">
                           <input type="hidden" name="delete_id" value="<?= $tarefa['id'] ?>">
                           <button class="deletar-button" type="submit" style="background:none;border:none;padding:0;">
                               <i class="fa-regular fa-trash-can" data-id="<?= $tarefa['id'] ?>"></i>
                           </button>
                       </form>

                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>

    <div class="container-tasks-finished">
        <div class="show-tasks">
            <h2>Concluídas</h2>
            <i id="arrow" class="fa-solid fa-caret-up close"></i>
        </div>
        <div id="cards-tasks-finished" class="hide">
            <?php if (!empty($tarefas)): ?>
                <?php foreach ($tarefas as $tarefa): ?>
                    <?php if ($tarefa['concluida']): ?>
                        <div class="task-finished">
                            <div class="input-name">
                                <input type="checkbox" id="task-finished-<?= $tarefa['id'] ?>" class="custom-checkbox" checked>
                                <label for="task-finished-<?= htmlspecialchars($tarefa['id']) ?>"><?= htmlspecialchars($tarefa['titulo']) ?></label>
                            </div>
                            <div class="icons-container">
                                <i class="fa-regular fa-pen-to-square" data-id="<?= $tarefa['id'] ?>"></i>
                                <i class="fa-regular fa-trash-can" data-id="<?= $tarefa['id'] ?>"></i>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhuma tarefa concluída.</p>
            <?php endif; ?>
        </div>
    </div>

    <div id="modal-container" class="hide">
        <div class="modal">
            <div class="header-modal">
                <h2>Editar Tarefa</h2>
                <i class="fa-solid fa-xmark close-modal"></i>
                <div class="line-divider"></div>
            </div>
            <form action="/editarTarefa" method="POST" class="edit-task-form">
                <input type="hidden" id="task-id" name="id"> <!-- Campo oculto para o ID -->
                <label for="title-task-edit">Título</label>
                <input type="text" id="title-task-edit" name="titulo" placeholder="Título da tarefa" required>

                <label for="description-task-edit">Descrição</label>
                <textarea name="descricao" id="description-task-edit"></textarea>

                <div class="buttons-task-edit">
                    <button type="button" class="cancel-btn">cancelar</button>
                    <button type="submit" class="save-btn">salvar</button>
                </div>
            </form>
        </div>
    </div>
</main>

<script src="./../script/script.js"></script>
<script src="./../script/modal.js"></script>
</body>
</html>

