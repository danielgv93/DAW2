addEventListener('load', inicio, false);

function inicio() {
    let arrayDadosURL = Array("img/001.jpg", "img/002.jpg", "img/003.jpg", "img/004.jpg", "img/005.jpg", "img/006.jpg");
    let botonInput = document.getElementById("inputBoton");
    
    botonInput.addEventListener("click", function () {
        let dadoCara = Math.round(Math.random()*6+1);
        document.images[0].src = arrayDadosURL[dadoCara-1];
    }, false)
}
