addEventListener("load", inicio, false);

function inicio() {
    // Elemento HTML
    let elementoHTML = document.documentElement;
    alert(elementoHTML.nodeName + elementoHTML.nodeType);

    // Numero de hijos
    let hijosHTML = Array();
    for (const hijo of elementoHTML.childNodes) {
        if (hijo.nodeName !== "#text") {
            hijosHTML.push(hijo);
        }
    }
    alert("Numero de hijos: " + hijosHTML.length);

    //
}