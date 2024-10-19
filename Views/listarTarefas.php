<main>
    <div class="container-tasks-pending">
        <form action="" class="add-task-form">
            <input type="text" class="name-add-task-input"placeholder="Adicionar nova tarefa">
            <div class="form-data-fields">
                <input type="text" class="description-add-task-input" placeholder="Descrição">
                <div class="divider-add-task-form"></div>
                <div class="container-buttons-add-task">
                    <button class="cancel-add-task">cancelar</button>
                    <button class="save-add-task">salvar</button>
                </div>
            </div>
        </form>
        <?php if (!empty($tarefas)): ?>
            <?php foreach ($tarefas as $tarefa): ?>
                <?php if (!$tarefa['concluida']): ?>
                    <div class="task-pending">
                        <div class="input-name">
                            <input type="checkbox" id="task-<?= $tarefa['id'] ?>" class="custom-checkbox">
                            <label for="task-<?= htmlspecialchars($tarefa['id']) ?>"><?= htmlspecialchars($tarefa['titulo']) ?></label>
                        </div>
                        <div class="icons-container">
                            <i class="fa-regular fa-pen-to-square" data-id="<?= $tarefa['id'] ?>"></i>
                            <i class="fa-regular fa-trash-can" data-id="<?= $tarefa['id'] ?>"></i>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhuma tarefa encontrada.</p>
        <?php endif; ?>
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

                <div class="buttons-task-edit">
                    <button class="cancel-btn">cancelar</button>
                    <button class="save-btn">salvar</button>
                </div>
            </form>
        </div>
    </div>
</main>
