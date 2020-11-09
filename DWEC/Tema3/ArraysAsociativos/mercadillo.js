addEventListener('load', inicio, false);

function inicio() {
    let tienduca = {"tomate": 5, "lechuga": 10, "manzanas": 14};

    let textoLabel = document.getElementById("labelTexto");
    let nombreInput = document.getElementById("inputNombre");
    let stockInput = document.getElementById("inputStock");
    let venderBoton = document.getElementById("botonVender");
    venderBoton.addEventListener("click", function (){
        if (vender(tienduca, nombreInput.value, stockInput.value)) {
            textoLabel.innerHTML = `Quedan ${tienduca[nombreInput.value]} ${nombreInput.value+"s"}`;
        }
    }, false)

}
function vender(arrayProductos, nombre, stock) {
    if (arrayProductos[nombre] >= stock) {
        arrayProductos[nombre] -= stock;
        alert(`Se han vendido ${stock} de ${nombre}`);
        return true;
    } else {
        alert("Error");
        return false;
    }
}