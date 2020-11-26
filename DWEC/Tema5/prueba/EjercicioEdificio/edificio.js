addEventListener("load", inicio, false);

function inicio() {
    let addEdificio = document.getElementById("addEdificio");
    let arrayEdificios = Array();
    addEdificio.addEventListener("click", function () {
        let ed = new Edificio("Campoo", "6", "39300", Array(0, 1, 2, 3, 4));
        arrayEdificios.push(ed);

    }, false);
}