// LÓGICA PARA ABRIR E FECHAR

const sideBar = document.querySelector("aside");
const sideBarContainer = document.querySelector("#sidebar-container");

document.querySelector(".toggle-menu").addEventListener("click", () => {
    sideBar.classList.toggle("close-sidebar");
    sideBarContainer.classList.toggle("sidebar-container");
});

// LÓGICA PARA MOSTRAR INPUT DE ADICIONAR CATEGORIA

const input = document.getElementById("category")

document.getElementById("add-category").addEventListener("click", ()=>{
    input.classList.toggle("hide-input")
})


// LÓGICA DE MOSTRAR E ESCONDER CATEGORIAS

const arrowCategory = document.getElementById("toggle-category")
const categories = document.getElementById("categorias-container")

document.querySelector(".header-categorias").addEventListener("click", ()=>{
    arrowCategory.classList.toggle("hide-category")
    categories.classList.toggle("hide-categories")
})


