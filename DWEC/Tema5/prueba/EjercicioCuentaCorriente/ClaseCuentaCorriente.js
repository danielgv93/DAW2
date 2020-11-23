function CuentaCorriente(datosPers, nCuenta, saldo) {
    this.datosPers = new datosPers;
    this.nCuenta = nCuenta;
    this.saldo = saldo;
    this.visualizarCliente = visualizarDatosCliente;
}

function visualizarDatosCliente() {
    return `Datos Personales -> ${this.datosPers.visualizarDatosPersonales}\n`;
}