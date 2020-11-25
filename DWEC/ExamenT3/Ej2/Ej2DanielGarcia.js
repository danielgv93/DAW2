addEventListener("load", inicio, false);

function inicio() {
    let etiquetaResultado = document.getElementById("resultado");
    let texto = "";
    do {
        texto = prompt("Introducir una palabra");
    } while (texto === "");

    etiquetaResultado.innerHTML = letras(texto);
    }



let letras = (texto) => {
    let regexp = /[A-Z]/g;
    // Comprobamos si hay coincidencias de MAYUS
    let matches_array = texto.match(regexp);
    // Si es null quiere decir que no hay ninguna MAYUS. Comprobamos si es exclusivamente MINUS
    if (matches_array == null) {
        regexp = /[a-z]/g;
        matches_array = texto.match(regexp);
        if (matches_array.length === texto.length) {
            return `Cadena formada por MINUSCULAS`;
        }
    }
    // Comprobamos si es exclusivamente MAYUS
    if (matches_array.length === texto.length) {
        return `Cadena formada por MAYUSCULAS`;
    }
    // Si es mezcla de MAYUS y MINUS
    return `Cadena formada por MAYUSCULAS y MINUSCULAS`;
}
