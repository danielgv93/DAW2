addEventListener('load', inicio, false);

function inicio() {
    let arrayDadosURL = Array("img/001.jpg", "img/002.jpg", "img/003.jpg", "img/004.jpg", "img/005.jpg", "img/006.jpg");
    let imagenDado = document.getElementById("dado");
    let botonInput = document.getElementById("inputBoton");
    
    botonInput.addEventListener("click", function () {
        let dadoCara = parseInt(Math.round(Math.random()*6+1));
        imagenDado.src = arrayDadosURL[dadoCara-1];
    }, false)
}
