const modalContainer = document.getElementById("modal-container");
const titleInput = document.getElementById("title-task-edit");
const descriptionInput = document.getElementById("description-task-edit");
const taskIdInput = document.getElementById("task-id");
const categorySelect = document.getElementById("category-task-edit");

document.querySelectorAll(".editar-button").forEach(button => {
    button.addEventListener("click", (e) => {
        const taskId = e.target.getAttribute("data-id");
        const taskTitle = e.target.closest('.task-pending').querySelector('label').innerText;
        const taskDescription = e.target.getAttribute("data-description");
        const taskCategoriaId = e.target.getAttribute("data-categoria_id");

        taskIdInput.value = taskId;
        titleInput.value = taskTitle;
        descriptionInput.value = taskDescription;

        categorySelect.value = taskCategoriaId;

        modalContainer.classList.remove("hide");
        modalContainer.classList.add("modal-container");
    });
});

document.querySelector('.close-modal').addEventListener('click', () => {
    modalContainer.classList.add("hide");
});
