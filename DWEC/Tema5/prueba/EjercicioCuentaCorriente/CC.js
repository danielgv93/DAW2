addEventListener("load", inicio, false);

function inicio() {
    let CC = crearCuentasCorrientes();
    let textArea = document.getElementById("resultado");
    mostrarArray(CC, textArea);
    regalarMilEuros(CC);
    cargarRetencion(CC);
    mostrarArray(CC, textArea);

}

function crearCuentasCorrientes() {
    let array = Array();
    for (let i = 0; i < 5; i++) {
        array.push(new CuentaCorriente(new DatosPersonales(`Usuario${i+1}`, "72152050S", "Torrelavega", parseInt(random(10000000,99999999))), parseInt(random(1000,9999)), parseFloat(random(3000, 10000).toFixed(2))))
    }
    return array;
}

function random(min, max) {
    return Math.random() * (max - min) + min;
}

function mostrarArray(array, textArea) {
    for (const element of array) {
        textArea.value += `${element.visualizarCliente()}\n`;
        textArea.value += `${element.visualizarSaldo()}\n`;
    }
    textArea.value += `-----------------------------\n`;
}

function regalarMilEuros(array) {
    for (const arrayElement of array) {
        arrayElement.abono(1000);
    }
    return array;
}

function cargarRetencion(array) {
    for (const arrayElement of array) {
        arrayElement.cargo(arrayElement.saldo*0.1);
    }
    return array;
}