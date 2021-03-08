function plantilla(nPedido, descripcion, pago) {
    this.nPedido = nPedido;
    this.descripcion = descripcion;
    this.total = Calcular;
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

function Calcular() {
    let subtotales = document.getElementsByName("subtotal");
    let total = 0;
    for (let i = 0; i < subtotales.length; i++) {
        total += subtotales[i].value;
    }
    return total;
}