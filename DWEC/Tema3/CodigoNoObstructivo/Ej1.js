addEventListener('load', inicio, false);
var cajaNombre, cajaApellido, botonMostrar, nombre;
function inicio() {
    cajaNombre = document.getElementById("nombre");
    cajaApellido = document.getElementById("apellido");
    botonMostrar = document.getElementById("mostrar");
    nombre = cajaNombre.value;
    let apellido = cajaApellido.value;

}

alert(nombre);