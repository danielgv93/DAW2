function Plantilla(nPedido, descripcion, pago, total) {
    this.nPedido = nPedido;
    this.descripcion = descripcion;
    this.total = total;
    this.calcular = calcular;
    this.pago = pago;
}

function ver() {
    let info = "NºPedido: " + this.nPedido + "\n";
    for (let i = 0; i < this.descripcion.length; i++) {
        info += this.descripcion[i] + "\n";
    }
    info += this.total + "\n" + this.pago;
    return info;
}

function calcular() {
    let subtotales = document.getElementsByName("subtotal");
    let total = 0;
    for (let i = 0; i < subtotales.length; i++) {
        total += subtotales[i].value;
    }
    this.total = total;
}