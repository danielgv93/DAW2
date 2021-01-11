addEventListener("load", inicio, false);

function inicio() {
    let parrafos = document.getElementsByTagName("p");
    let primerParrafo = parrafos[0];
    let enlaces = primerParrafo.getElementsByTagName("a");

    if (document.body.hasChildNodes()) {
        let hijos = document.body.childNodes;
        for (const hijo of hijos) {
            if (hijo.nodeName === "#text") {
                document.write(hijo.nodeValue + "<br>");
            }

        }
    }
}