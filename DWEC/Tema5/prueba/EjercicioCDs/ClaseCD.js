function cd_musica(titulo, grupo, fecha, precio) {
    this.titulo = titulo;
    this.grupo = grupo;
    this.fecha = fecha;
    this.precio = precio;
    this.visualizacion = visualizar;
}

function visualizar() {
    return `Titulo: ${this.titulo}\nGrupo: ${this.grupo}\nFecha: ${this.fecha}\n\n`;
}