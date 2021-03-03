addEventListener("load", inicio, false);

var estadoNevera = true;

function inicio() {
    let nevera = document.querySelector("img");

    nevera.addEventListener("click", function () {
        nevera.src = estadoNevera ? "img/abierta.jpg" : "img/cerrada.jpg";
        estadoNevera = !estadoNevera;
        document.querySelector("#productosNevera").className = estadoNevera ? "oculto" : "";
    })
}