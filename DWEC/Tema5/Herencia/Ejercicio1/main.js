addEventListener("click", inicio, false);

function inicio() {
    Vaca.prototype = new Animal(); //????
    Tigre.prototype = new Animal();
    let arrayVaca = Array();
    let arrayTigre = Array();
    let nombre = document.getElementById("nombre");
    let especie = document.getElementById("especie");
    let nPatas = document.getElementById("nPatas");
    let tieneCola = document.getElementById("tieneCola");
    let crearBtn = document.getElementById("crearAnimal-btn");
    let resultado = document.getElementById("resultado");
    crearBtn.addEventListener("click", function () {
        if (especie.value === "vaca") {
            let vaca = new Vaca();//????
            vaca.prototype.nombre = nombre.value;
            vaca.prototype.especie = especie.value;
            vaca.prototype.nPatas = nPatas.value;
            vaca.prototype.tieneCola = tieneCola.value;
            arrayVaca.push(vaca);
            resultado.value = mostrarArray(arrayVaca, arrayTigre);
        } else {
            let tigre = new Tigre();
            arrayTigre.push(tigre.slice());
            resultado.value = mostrarArray(arrayVaca, arrayTigre);
        }
    }, false);
}

function mostrarArray(arrayVaca, arrayTigre) {
    let string = `Vacas:\n`;
    for (const vaca of arrayVaca) {
        string += `${vaca.visualizar()} \n`;
    }
    string += `------\nTigres:\n`;
    for (const tigre of arrayTigre) {
        string += `${tigre.visualizar()} \n`;
    }
    return string;
}
