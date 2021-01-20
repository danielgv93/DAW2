addEventListener("load", inicio, false);

nPalabra = 0;
function inicio() {
    let liSelected = Array();
    let palabrasCorrectas = Array("palabra", "aparecer", "pizarra");
    let spans = document.querySelectorAll("span");
    let ul = document.querySelector("ul");
    let corregir = document.getElementById("corregir");

    // LISTA
    for (const li of ul.children) {
        li.addEventListener("click", function () {
            liSelected.push(li);
            spans[nPalabra].innerHTML = liSelected[nPalabra].innerHTML;
            ul.removeChild(liSelected[nPalabra]);
            increasenPalabra();
        }, false);
    }

    // SPANS
    for (const span of spans) {
        span.addEventListener("click", function () {
            decreasenPalabra();
            ul.appendChild(liSelected.pop());
            spans[nPalabra].innerHTML = "....";
        }, false);
    }

    corregir.addEventListener("click", function () {
        corregirFrase(spans, palabrasCorrectas);
        
    }, false);
}

function corregirFrase(arraySpan, palabrasCorrectas) {
    let aux = true;
    for (let i = 0; i < arraySpan.length; i++) {
        if (arraySpan[i].innerHTML !== palabrasCorrectas[i]) {
            arraySpan[i].innerHTML = "....";
            aux = false;
        }
    }
    return aux;
}

function decreasenPalabra() {
    if (nPalabra !== 0) {
        nPalabra--;
    }
}

function increasenPalabra() {
    if (nPalabra !== document.querySelectorAll("span").length) {
        nPalabra++;
    }
}