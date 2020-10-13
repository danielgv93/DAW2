function aplicarIva(precioBase, iva) {
    let precioFinal = precioBase * (1+iva);
    alert(`El precio final del producto es ${precioFinal}`);
    return precioFinal;
}
aplicarIva(100, 0.18);

function media(n1, n2) {
    return (n1 + n2) / 2;
}


(function(quien) {
    console.log("hola" + quien);
})("Dani");

function saludator(quien) {
    return function(){
        alert("hola " + quien);
    }
}

let saluda = saludator("dani");

saluda();

let cuadrado = numero => numero * numero;
let saludo = (nombre, tratamiento) => alert('Hola ' + tratamiento + ' ' + nombre);

document.write(cuadrado(3));
document.write(saludo("dani", "Sr"));