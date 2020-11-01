addEventListener('load', inicio, false);

function inicio() {
    // Inicialización elementos HTML
    let arrayCarneObjetos = document.getElementsByName("carne");
    let objetoPan = document.getElementById("pan");
    let arrayIngredientesObjetos = document.getElementsByName("ingredientes");
    let inputSubtotalCarne = document.getElementById("subtotalCarne");
    let inputSubtotalIngredientes = document.getElementById("subtotalIngredientes");
    let inputSubtotalPan = document.getElementById("subtotalPan");
    let inputTotal = document.getElementById("total");

    //    Inicializacion botones
    let botonCalcularCarne = document.getElementById("calcularCarneBoton");
    let botonCalcularIngredientes = document.getElementById("calcularIngredientesBoton");
    let botonCalcularPan = document.getElementById("calcularPanBoton");

    // Eventos botones
    botonCalcularCarne.addEventListener("click", function () {
        inputSubtotalCarne.value = calcularPrecioCarne(arrayCarneObjetos, precioCarneArray);
        inputTotal.value = calcularTotal(inputSubtotalCarne.value, inputSubtotalIngredientes.value, inputSubtotalPan.value);
    }, false)
    botonCalcularIngredientes.addEventListener("click", function () {
        inputSubtotalIngredientes.value = calcularPrecioIngredientes(arrayIngredientesObjetos);
        inputTotal.value = calcularTotal(inputSubtotalCarne.value, inputSubtotalIngredientes.value, inputSubtotalPan.value);
    }, false)
    botonCalcularPan.addEventListener("click", function () {
        inputSubtotalPan.value = calcularPrecioPan(tipoPan, precioPanArray, objetoPan);
        inputTotal.value = calcularTotal(inputSubtotalCarne.value, inputSubtotalIngredientes.value, inputSubtotalPan.value);
    }, false)

    // ARRAYS
    let precioCarneArray = Array(3,2,2.5,4,3.5);
    let precioPanArray = Array(2,4.5,2.5,3);
    let tipoPan = Array("trigo", "centeno", "integral", "crujiente");
    
}

function calcularTotal(carne, ingredientes, pan) {
    return parseFloat(carne) + parseFloat(ingredientes) + parseFloat(pan);
}

function calcularPrecioPan(tipoPan, precioPan, objetoPan) {
    let precio = 0;
    for (let i = 0; i < tipoPan.length; i++) {
        if (tipoPan[i] === objetoPan.value) {
            precio = precioPan[i];
            break;
        }
    }
    return parseFloat(precio.toFixed(2));
}

function calcularPrecioIngredientes(arrayIngredientesObjetos) {
    let nIngredientes = 0;
    for (let i = 0; i < arrayIngredientesObjetos.length; i++) {
        if (arrayIngredientesObjetos[i].checked === true) {
            nIngredientes++;
        }
    }
    return parseFloat((nIngredientes * 0.4).toFixed(2));
}

function calcularPrecioCarne (arrayCarneObjetos, precioCarne) {
    for (let i = 0; i < arrayCarneObjetos.length; i++) {
        if (arrayCarneObjetos[i].checked === true) {
            return parseFloat(precioCarne[i].toFixed(2));
        }
    }
     return 0;
}
