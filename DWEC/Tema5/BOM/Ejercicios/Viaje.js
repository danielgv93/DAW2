addEventListener("load", inicio, false);

function inicio() {
    let matriz = Array(
        Array("Salidas", "Roma", "Paris", "Londres"),
        Array("Oviedo", 0, 0, 0),
        Array("Madrid", 0, 0, 0),
        Array("Santander", 0, 0, 0),
        Array("Bilbao", 0, 0, 0));
    let imagenes = document.images;
    let salida = document.getElementById("salida");
    let llegada = document.getElementById("llegada");
    let transporte = document.getElementsByName("transporte");
    let mostrar = document.getElementById("ver");

    mostrar.addEventListener("click", function () {
        let ventana = window.open("", "Popup", "width=400, height=400");
        ventana.moveTo(screen.width/2-200, screen.height/2-200);
        registrarViaje(salida, llegada, matriz);
        ventana.document.write(
            `<img src="${document.images[llegada.value].src}"><br>
            Lugar de salida: ${getSalida(salida)}<br>
            Lugar de llegada: ${getLlegada(llegada)}<br>
            Metodo de transporte: ${getMedioTransporte(transporte)}<br>
            ${imprimirTabla(matriz)}`
        );
    }, false);
}

function registrarViaje(salida, llegada, array) {
    array[salida.value][llegada.value]++;
}

function imprimirTabla(array) {
    let texto = "<table><tr>";
    for (let i = 0; i < array[0].length; i++) {
        texto += `<th>${array[0][i]}</th>`
    }
    texto += "</th>";
    for (let i = 1; i < array.length; i++) {
        texto += "<tr>";
        for (let j = 0; j < array[i].length; j++) {
            texto += `<td>${array[i][j]}</td>`;
        }
        texto += "</tr>";
    }
    return texto;
}

function getMedioTransporte(transporte) {
    for (let i = 0, length = transporte.length; i < length; i++) {
        if (transporte[i].checked) {
            return transporte[i].value;
        }
    }
}

function getLlegada(llegada) {
    if (llegada.value == 0) {
        return "Roma";
    } else if(llegada.value == 1) {
        return "Paris";
    } else {
        return "Londres";
    }
}

function getSalida(salida) {
    if (salida.value == 0) {
        return "Oviedo";
    } else if(salida.value == 1) {
        return "Madrid";
    } else if(salida.value == 2) {
        return "Santander";
    } else {
        return "Bilbao";
    }
}
