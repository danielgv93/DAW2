function Programador(nombre, cedula, edad, casado, salario, lineasDeCodigoPorDia, lenguajeDominante) {
    Empleado.call(Empleado, nombre,  cedula, edad, casado, salario);
    this.lineasDeCodigoPorDia = lineasDeCodigoPorDia;
    this.lenguajeDominante = lenguajeDominante;
    this.calcularLineasMes = calcularLineasMes;
}

function calcularLineasMes(mes) {
    let dias = calcDias(mes);
    return this.lineasDeCodigoPorDia * dias;
}


function calcDias(mes) {
    if (mes === 1 || mes === 3 || mes === 5 || mes === 7 || mes === 8 || mes === 10 || mes === 12) {
        return  31;
    } else if (mes === 4 || mes === 6 || mes === 9 || mes === 11) {
        return 30;
    } else {
        return 28;
    }
}