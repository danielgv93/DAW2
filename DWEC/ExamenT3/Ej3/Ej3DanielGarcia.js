addEventListener('load', inicio, false);

function inicio() {
    let arrayImagenes = Array("img/1.jpg", "img/2.jpg", "img/3.jpg", "img/4.jpg", "img/5.jpg", "img/6.jpg", "img/7.jpg", "img/8.jpg");
    let posicionActual = 0;
    let posicionInicial = 0;
    let posicionFinal = 7;
    document.images[posicionActual].src = arrayImagenes[posicionActual];
    let inicio = document.getElementById("inicioBoton");
    let final = document.getElementById("finalBoton");
    let avanzar = document.getElementById("adelanteBoton");
    let atras = document.getElementById("atrasBoton");
    avanzar.addEventListener("click", function () {
        if (posicionActual !== posicionFinal) {
            document.images[posicionActual].src = "";
            posicionActual++;
            document.images[posicionActual].src = arrayImagenes[posicionActual];
        }
    })
    atras.addEventListener("click", function () {
        if (posicionActual !== posicionInicial) {
            document.images[posicionActual].src = "";
            posicionActual--;
            document.images[posicionActual].src = arrayImagenes[posicionActual];
        }
    })
    inicio.addEventListener("click", function () {
        document.images[posicionActual].src = "";
        posicionActual = posicionInicial;
        document.images[posicionActual].src = arrayImagenes[posicionActual];
    })
    final.addEventListener("click", function () {
        document.images[posicionActual].src = "";
        posicionActual = posicionFinal;
        document.images[posicionActual].src = arrayImagenes[posicionActual];
    })
}