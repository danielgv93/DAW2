function Analista(nombre, cedula, edad, casado, salario, proyectos) {
    Empleado.call(Empleado, nombre, cedula, edad, casado, salario);
    this.proyectos = proyectos;
    this.nProyectos = nProyectos;
}

function nProyectos() {
    return this.proyectos.length;
}