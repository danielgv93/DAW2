addEventListener("load", inicio, false);

let CC = new CuentaCorriente(new datosPersonales("Daniel", "72152050S", "Torrelavega", "654654654"), "123456789", 1235)

function inicio() {
    let textArea = document.getElementById("resultado");
    textArea.value = CC.visualizarCliente();
}