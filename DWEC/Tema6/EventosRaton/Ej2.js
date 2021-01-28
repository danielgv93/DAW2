addEventListener("load", inicio, false);
cuadrado = null;
menu = null;
p = null;
function inicio() {
    cuadrado = document.getElementById("cuadrado");
    menu = document.getElementById("menu");
    p = document.querySelector("p");

    cuadrado.addEventListener("mousedown", function () {
        document.addEventListener("mousemove", mover, false);
    });

    cuadrado.addEventListener("dblclick", function () {
        document.removeEventListener("mousemove", mover, false);
        p.innerText = "StandBy"
    });
}

function mover(e) {
    let x = e.pageX;
    let y = e.pageY;
    cuadrado.setAttribute("style", `left:${x - 100}px; top:${y - 100}px; position: absolute`);
    p.innerText = "Moviendo"
}