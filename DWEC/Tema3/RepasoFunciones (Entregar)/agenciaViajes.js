addEventListener('load', inicio, false);

function inicio() {
    botonCosteHotel = document.getElementById("calcularHotelBoton");
    numeroNoches = parseInt(document.getElementById("noches").value);
    tipoHotel = document.getElementById("tipoHotel").value;
    inputTotalHotel = document.getElementById("totalHotel");

    botonCosteHotel.addEventListener("click", actualizarPrecioHotel, false);


}

function actualizarPrecioHotel() {
    inputTotalHotel.value = `${calculoHotel(numeroNoches, tipoHotel)} €`;
}

function calculoHotel(n, estrellas) {
    let precio = 0;
    if (estrellas == 5) {
        return precio = 130;
    } else if (estrellas == 2) {
        return precio = 35;
    } else {
        precio = 0;
    }
    return precio * n;
}

function calculoAvion(ciudad, tipoVuelo) {
    let precioCiudad = 0;
    switch (ciudad) {
        case "madrid":
            precioCiudad = 200;
            break;
        case "tokyo":
            precioCiudad = 500;
            break;
        case "berlin":
            precioCiudad = 70;
            break;
        case "belgica":
            precioCiudad = 37;
            break;
        default:
            break;
    }

    if (tipoVuelo) {
        return precioCiudad * 0.9;
    } else {
        return precioCiudad;
    }
}

function alquilerCoche(numeroNoches) {
    precioAlquiler_dia = 40;
    if (numeroNoches >= 7) {
        return precioAlquiler_dia * numeroNoches - 50;
    } else if (numeroNoches >= 3) {
        return precioAlquiler_dia * numeroNoches - 20;
    } else if (numeroNoches > 0) {
        return precioAlquiler_dia * numeroNoches;
    } else {
        return null;
    }
}
