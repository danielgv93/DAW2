addEventListener('load', inicio, false);

function inicio() {
    let textoInput = document.getElementById("inputTexto");
    let visualizarBoton = document.getElementById("botonVisualizar");
    let textArea = document.getElementById("textAreaInput");
    visualizarBoton.addEventListener("click", function () {
        let caracter = octavoCaracter(textoInput.value);
        if (caracter !== false) {
            textArea.value = `El octavo caracter es: ${caracter}\n`;
            textArea.value += `La primera posicion es : ${primeraPos(textoInput.value, caracter)+1}\n`;
            textArea.value += `La ultima posicion es : ${ultimaPos(textoInput.value, caracter)+1}\n`;
            textArea.value += `El string entre medias es : ${entrePosiciones(textoInput.value, caracter)}\n`;
        }
    }, false);
}

function octavoCaracter(cadena) {
    if (cadena.length > 10) {
        return cadena.charAt(7);
    }
    return false;
}

function primeraPos(texto, caracter) {
    return texto.indexOf(caracter);
}

function ultimaPos(texto, caracter) {
    return texto.lastIndexOf(caracter);
}

function entrePosiciones(texto, caracter) {
    let inicio = primeraPos(texto, caracter);
    let final = ultimaPos(texto, caracter);
    return texto.substring(inicio, final);
}