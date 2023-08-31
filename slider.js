const carousel = document.querySelector(".caroussel"),
firstImg = carousel.querySelectorAll("img")[0];
arrowIcons = document.querySelectorAll(".wrapper i");

let isDragStart = false, prevPageX, prevScrollLeft;
let firstImgWidth = firstImg.clientWidth + 14; // pega o width da primeira imagem e adiciona o valor da margem como 14

arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        // se clicar no icone da esquerda, diminui o  valor do carousel scroll left e adiciona para o outro lado
        carousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
    });
});

const dragStart = (e) => {
    // atualizando os valores das variaveis globais com o evento de mover o mouse para (baixo?)
    isDragStart = true;
    prevPageX = e.pageX;
    prevScrollLeft = carousel.scrollLeft;
}

const dragging = (e) => {
    // passando as imagens/carousel para a esquerda de acordo com o cursor do mouse
    if(!isDragStart) return;
    e.preventDefaut();
    carousel.classList.add("dragging");
    let positionDiff = e.pageX - prevPageX;
    carousel.scrollLeft = prevScrollLeft - positionDiff;
}

const dragStop = () => {
    isDragStart = false;
    carousel.classList.remove("dragging");
}

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("mousemove", dragging);
carousel.addEventListener("mouseup", dragStop);
