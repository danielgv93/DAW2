addEventListener("load", inicio, false);

function inicio() {
    let clinica = crearClinica();

}

function crearClinica() {
    let clinica = Array();
    let tratamientos = Array("covid");
    for (let i = 0; i < 10; i++) {
        let habitacion = new Habitacion(i+1, "foto", tratamientos);
        habitacion.codPaciente = crearCodigo(crearDniRandom(11111111, 99999999)+"S");
        clinica.push(habitacion);
    }
    return clinica;
}

function crearDniRandom(min, max) {
    return Math.round(Math.random() * (max - min) + min).toString();
}