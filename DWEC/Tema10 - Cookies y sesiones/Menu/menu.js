addEventListener("load", inicio, false);

let arrayPedidos = Array();
let idPedido = localStorage.length;

function inicio() {
    validarCajas();
    borrarCajas();
    calcularSubtotales();
    registrarPedidoArray();
    almacenarEnLocal();
    document.getElementById("mostrarInfo").addEventListener("click", mostrarInfo)
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
            subtotales[i].value = (isNaN(parseFloat(cantidadCajas[i].value)) ? 0 : parseFloat(cantidadCajas[i].value)) * parseFloat(precios[i].value);
            let totalPedido = 0;
            for (let j = 0; j < subtotales.length; j++) {
                totalPedido += parseFloat(subtotales[j].value);
            }
            total.value = totalPedido;
        })
    }
}

function registrarPedido() {
    let pago = document.getElementsByName("pago");
    let subtotales = document.getElementsByName("subtotal");
    let total = document.getElementById("total");
    let productos = document.getElementsByName("producto");
    let cantidadCajas = document.getElementsByName("cantidad");
    let descripcion = Array();
    let pagoSelected;
    for(let i = 0; i < pago.length; i++){
        if(pago[i].checked){
            pagoSelected = pago[i].id;
        }
    }
    for (let i = 0; i < cantidadCajas.length; i++) {
        if (subtotales[i].value != 0) {
            descripcion.push(productos[i].innerText);
        }
    }
    let pedido = new Plantilla(idPedido++, descripcion, pagoSelected, total.value);
    arrayPedidos.push(pedido);
}

function registrarPedidoArray() {
    document.getElementById("registrar").addEventListener("click", function () {
        registrarPedido();
        console.log(arrayPedidos);
        alert("Pedido Registrado. No se olvide de guardarlo en local para que no se borre")
    });

}

function almacenarEnLocal() {
    document.getElementById("almacenar").addEventListener("click", function () {
        for (let i = 0; i < arrayPedidos.length; i++) {
            localStorage.setItem(`pedido${arrayPedidos[i].nPedido}`, JSON.stringify(arrayPedidos[i]));
        }
        console.log(localStorage);
    })

}

function mostrarInfo() {
    let info = document.getElementById("info");
    info.innerHTML = "";
    arrayPedidos = Array();
    for (let i = 0; i < localStorage.length; i++) {
        arrayPedidos.push(JSON.parse(localStorage[i].getItem(Object.keys(localStorage)[i])));
    }
    console.log(arrayPedidos);
}