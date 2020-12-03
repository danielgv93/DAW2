function Habitacion(nHabitacion, foto, tratamientos) {
    this.nHabitacion = nHabitacion;
    this.codPaciente = 0;
    this.foto = foto;
    this.tratamientos = tratamientos;
    this.info = info;
    this.asignTratamiento = asignTratamiento;
    this.crearCodigo = crearCodigo;
}

function info() {
    return this.tratamientos.join(",");
}

function asignTratamiento(tratamiento) {
    this.tratamientos.push(tratamiento);
}

function crearCodigo(dni) {
    let texto = "";
    console.log(dni);
    texto += dni.substring(2, 2);
    texto += dni.substring(dni.length, 1)
    texto.concat(this.nHabitacion);
    return texto;
}