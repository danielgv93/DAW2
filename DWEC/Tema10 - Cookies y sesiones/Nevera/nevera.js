addEventListener("load", inicio, false);

var estadoNevera = true;

function inicio() {
    let nevera = document.querySelector("img");
    let comprarBoton = document.getElementById("comprar");
    let productosHtml = document.getElementsByName("productosTienda");
    getInfoNeveraSection()

    nevera.addEventListener("click", function () {
        nevera.src = estadoNevera ? "img/abierta.jpg" : "img/cerrada.jpg";
        estadoNevera = !estadoNevera;
        document.querySelector("#sectionNevera").className = estadoNevera ? "oculto" : "";
    })
    comprarBoton.addEventListener("click", function () {
        if (!estadoNevera) {
            guardarProductosLocal(productosHtml);
            generarProductosNevera()
            getInfoNeveraSection()
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
        let clave = Object.keys(localStorage)[i];
        let producto = document.createElement("div");
        producto.className = "row align-items-center";
        let boton = document.createElement("input");
        boton.setAttribute("style", "button");
        boton.className = "btn btn-primary boton";
        boton.setAttribute("id", clave)
        boton.setAttribute("type", "button")
        boton.style.width = "100px"
        boton.value = "Consumir";
        boton.addEventListener("click", function (){
            localStorage.setItem(clave, localStorage.getItem(Object.keys(localStorage)[i])-1);
            getInfoNeveraSection()
            if (parseInt(localStorage.getItem(Object.keys(localStorage)[i])) === 0) {
                this.remove();
                producto.remove();
                alert("Sin " + span.innerHTML + " en la nevera");
            }
        }, false);
        let img = document.createElement("img");
        img.src = "img/" + clave + ".png";
        img.style.height = "70px";
        if (parseInt(localStorage.getItem(Object.keys(localStorage)[i])) > 0) {
            producto.appendChild(img);
            producto.appendChild(boton);
            div.appendChild(producto);
        }
    }
    document.querySelector("#sectionNevera").appendChild(div);
}

function getInfoNeveraSection() {
    let neveraNodo = document.getElementById("infoNevera");
    neveraNodo.innerHTML = "";
    let tabla = document.createElement("table");
    tabla.className = "table";
    let trHeader = document.createElement("tr");
    let th = document.createElement("th");
    th.innerHTML = "Producto";
    trHeader.appendChild(th);
    th = document.createElement("th");
    th.innerHTML = "Cantidad";
    trHeader.appendChild(th);
    tabla.appendChild(trHeader);
    for (let i = 0; i < localStorage.length; i++) {
        let trBody = document.createElement("tr");
        let td = document.createElement("td");
        td.innerHTML = Object.keys(localStorage)[i];
        trBody.appendChild(td);
        td = document.createElement("td");
        td.innerHTML = localStorage.getItem(Object.keys(localStorage)[i]);
        trBody.appendChild(td);
        tabla.appendChild(trBody);
    }
    neveraNodo.appendChild(tabla);
}
