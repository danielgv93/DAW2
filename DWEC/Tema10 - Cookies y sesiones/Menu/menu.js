addEventListener("load", inicio, false);
let arrayPedidos = Array();
function inicio() {
    validarCajas();
    borrarCajas();
    calcularSubtotales();
}

function validarCajas() {
    let cantidadCajas = document.getElementsByName("cantidad");
    for (let i = 0; i < cantidadCajas.length; i++) {
        cantidadCajas[i].addEventListener("keypress", function (e) {
            if (e.keyCode < 48 || e.keyCode > 57) {
                e.preventDefault();
            }
        })
    }
}

function borrarCajas() {
    let cantidadCajas = document.getElementsByName("cantidad");
    let botonBorrar = document.getElementById("borrar");
    botonBorrar.addEventListener("click", function () {
        for (let i = 0; i < cantidadCajas.length; i++) {
            cantidadCajas[i].value = 0;
        }
    })
}

function calcularSubtotales() {
    let precios = document.getElementsByName("precio");
    let subtotales = document.getElementsByName("subtotal");
    let total = document.getElementById("total");
    let cantidadCajas = document.getElementsByName("cantidad");
    for (let i = 0; i < cantidadCajas.length; i++) {
        cantidadCajas[i].addEventListener("keyup", function (e) {
            subtotales[i].value = (parseFloat(cantidadCajas[i].value)) * parseFloat(precios[i].value);
            let totalPedido = 0;
            for (let j = 0; j < subtotales.length; j++) {
                totalPedido += parseFloat(subtotales[j].value);
            }
            total.value = totalPedido;
        })

    }
}