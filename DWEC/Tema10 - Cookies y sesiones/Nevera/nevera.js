addEventListener("load", inicio, false);

var estadoNevera = true;

function inicio() {
    let nevera = document.querySelector("img");
    let comprarBoton = document.getElementById("comprar");
    let productosHtml = document.getElementsByName("productosTienda");

    nevera.addEventListener("click", function () {
        nevera.src = estadoNevera ? "img/abierta.jpg" : "img/cerrada.jpg";
        estadoNevera = !estadoNevera;
        document.querySelector("#sectionNevera").className = estadoNevera ? "oculto" : "";
    })
    comprarBoton.addEventListener("click", function () {
        if (!estadoNevera) {
            guardarProductosLocal(productosHtml);
            generarProductosNevera()
        } else {
            alert("Abre la nevera antes de hacer la compra")
        }

    })
}

function guardarProductosLocal(productosHtml) {
    for (let i = 0; i < productosHtml.length; i++) {
        localStorage.setItem(productosHtml[i].getAttribute("id"), productosHtml[i].value);
    }
}

function generarProductosNevera() {
    try {
        document.querySelector("#productosNevera").remove();
    } catch (e) {
    }
    let div = document.createElement("div");
    div.setAttribute("id", "productosNevera");
    for (let i = 0; i < localStorage.length; i++) {
        let producto = document.createElement("div");
        producto.className = "row";
        let boton = document.createElement("input");
        boton.setAttribute("style", "button");
        boton.className = "col btn btn-primary";
        boton.setAttribute("id", Object.keys(localStorage)[i])
        boton.value = "Consumir";
        boton.addEventListener("click", function (){
            localStorage.setItem("")
        }, false);
        let span = document.createElement("span");
        span.setAttribute("name", "nevera")
        span.setAttribute("id", Object.keys(localStorage)[i])
        span.innerHTML = Object.keys(localStorage)[i];
        span.className = "col";
        if (parseInt(localStorage.getItem(Object.keys(localStorage)[i])) !== 0) {
            producto.appendChild(span);
            producto.appendChild(boton);
            div.appendChild(producto);
        }
    }
    document.querySelector("#sectionNevera").appendChild(div);
}

