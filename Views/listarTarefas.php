<main>
    <div class="container-tasks-pending">
        <form action="/" method="POST" class="add-task-form" autocomplete="off">
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
        <?php if (!empty($tarefas)): ?>
        <?php foreach ($tarefas as $tarefa): ?>
            <?php if (!$tarefa['concluida']): ?>
                <div class="task-pending">
                    <div class="input-name">
                        <form action="" method="POST" id="task-form-<?= $tarefa['id'] ?>">
                            <input name="task-id" type="hidden" value="<?= $tarefa['id'] ?>">
                            <input name="check-task" type="checkbox" id="task-<?= $tarefa['id'] ?>" class="custom-checkbox"
                                   onchange="document.getElementById('task-form-<?= $tarefa['id'] ?>').submit();">
                            <label for="task-<?= htmlspecialchars($tarefa['id']) ?>"><?= htmlspecialchars($tarefa['titulo']) ?></label>
                        </form>


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
        <?php else: ?>
            <?php require '../Views/notFoundTask.html'?>
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
                                <form action="" method="POST" id="task-form-<?= $tarefa['id'] ?>">
                                    <input name="uncheck-task" type="hidden" value="<?= $tarefa['id'] ?>">
                                    <input name="uncheck-task" type="checkbox" id="uncheck-task-<?= $tarefa['id'] ?>" checked class="custom-checkbox"
                                           onchange="document.getElementById('task-form-<?= $tarefa['id'] ?>').submit();">
                                    <label for="uncheck-task-<?= htmlspecialchars($tarefa['id']) ?>"><?= htmlspecialchars($tarefa['titulo']) ?></label>
                                </form>
                            </div>
                            <div class="icons-container">
                                <form action="/deletarTarefa" method="POST" style="display:inline;">
                                    <input type="hidden" name="delete_id" value="<?= $tarefa['id'] ?>">
                                    <button class="deletar-button" type="submit" style="background:none;border:none;padding:0;">
                                        <i class="fa-regular fa-trash-can" data-id="<?= $tarefa['id'] ?>"></i>
                                    </button>
                                </form>                            </div>
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
                <input type="hidden" id="task-id" name="id">
                <label for="title-task-edit">Título</label>
                <input type="text" id="title-task-edit" name="titulo" placeholder="Título da tarefa" required>

                <label for="description-task-edit">Descrição</label>
                <textarea name="descricao" id="description-task-edit"></textarea>

                <label for="completed-task-edit">Concluída</label>
                <input type="checkbox" id="completed-task-edit" name="concluida" value="1">

                <div class="buttons-task-edit">
                    <button type="button" class="cancel-btn">cancelar</button>
                    <button type="submit" class="save-btn">salvar</button>
                </div>
            </form>
        </div>
    </div>

</main>
