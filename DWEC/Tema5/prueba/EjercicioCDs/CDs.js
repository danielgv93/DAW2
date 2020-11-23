addEventListener("load", inicio, false);
let arrayMusica = Array(
    new cd_musica("Kill this love", "Blackpink", "2019", 22),
    new cd_musica("The baddest", "GIDLE", "2020",13),
    new cd_musica("Danger", "BTS", "2019",19)
)
function inicio() {
    let textArea = document.getElementById("resultado");
    visualizarEnTextArea(arrayMusica, textArea);
}

function visualizarEnTextArea(arrayMusica, textArea) {
    let texto = "";
    let precioTotal = 0;
    for (const cdMusica of arrayMusica) {
        texto += cdMusica.visualizacion();
        precioTotal += cdMusica.precio;
    }
    textArea.value = texto;
    textArea.value += `Precio Total: ${precioTotal}`;
}

