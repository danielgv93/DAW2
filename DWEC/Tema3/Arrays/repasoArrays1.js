addEventListener('load', inicio, false);

function inicio() {
    mostrarBoton = document.getElementById("botonMostrar");
    mostrarBoton.addEventListener("click", function() {
        inputTextArea.value = mostrarArray(todosAlumnos);
    }, false);

    bajaInput = document.getElementById("bajaAlumnoInput");
    bajaBoton = document.getElementById("botonBajaAlumno");
    bajaBoton.addEventListener("click", darBajaAlumno(bajaInput.value), false);

    inputTextArea = document.getElementById("visualizar");
    

}

let alumnos = new Array("Juan López", "Luis Guerra", "María de la Hoz", "Elena Gómez", "Julia Caba");
let erasmus = new Array("John Smith", "Lia Warner", "Oscar Klein", "Edward Crow");

let todosAlumnos = alumnos.concat(erasmus);

function mostrarArray(array) {
    let resultado = array.join("\n");
    return resultado;
}

function darBajaAlumno(alumnoBaja, array) {
    array.forEach((element, key) => {
        if (element == alumnoBaja) {
            array.splice();
        }
    });
}