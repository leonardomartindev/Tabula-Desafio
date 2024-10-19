// Lógica para formatar a data atual na página
const getFormattedDate = () => {
    const daysOfWeek = ["Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado"];
    const months = ["janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"];
    const date = new Date();
    const dayOfWeek = daysOfWeek[date.getDay()];
    const day = date.getDate();
    const month = months[date.getMonth()];
    return `${dayOfWeek}, ${day} de ${month}`;
};
const formattedDate = getFormattedDate();
const actualDate = document.getElementById("actual-date");
actualDate.innerHTML = formattedDate;

// Lógica para mostrar ou esconder as tarefas concluídas
const containerTasksFinished = document.getElementById("cards-tasks-finished");
const arrowShow = document.querySelector("#arrow");

document.querySelector(".show-tasks").addEventListener("click", () => {
    containerTasksFinished.classList.toggle("hide");
    arrowShow.classList.toggle("open");
});

// Lógica para fechar e mostrar modal
const modal = document.querySelector(".modal-container");

function closeModal(e) {
    e.preventDefault()
    modal.classList.remove("modal-container");
    modal.classList.add("hide");
}

document.querySelector(".close-modal").addEventListener("click", closeModal);
document.querySelector(".cancel-btn").addEventListener("click", closeModal);

const formFields = document.querySelector(".form-data-fields");
const inputs = document.querySelectorAll(".name-add-task-input, .description-add-task-input");
const buttons = document.querySelectorAll(".cancel-add-task, .save-add-task");

function resetForm() {
    inputs.forEach(input => input.value = '');
}

inputs.forEach(input => {
    input.addEventListener("focus", () => {
        formFields.style.height = formFields.scrollHeight + 'px';
    });

    input.addEventListener("blur", () => {
        setTimeout(() => {
            if (!document.querySelector(".add-task-form").contains(document.activeElement)) {
                formFields.style.height = '0';
                resetForm();
            }
        }, 100);
    });
});

buttons.forEach(button => {
    button.addEventListener("focus", () => {
        formFields.style.height = formFields.scrollHeight + 'px';
    });

    button.addEventListener("blur", () => {
        setTimeout(() => {
            if (!document.querySelector(".add-task-form").contains(document.activeElement)) {
                formFields.style.height = '0';
                resetForm();
            }
        }, 100);
    });
});


