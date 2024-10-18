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

const actualDate = document.getElementById("actual-date")
actualDate.innerHTML = formattedDate;

// Lógica para mostrar ou esconder as tarefas concluidas
const containerTasksFinished = document.getElementById("container-tasks-finished")
const arrowShow = document.querySelector(".fa-solid")

const showTasks = document.querySelector(".show-tasks").addEventListener("click", () =>{
    containerTasksFinished.classList.toggle("hide")
    arrowShow.classList.toggle("open")
})