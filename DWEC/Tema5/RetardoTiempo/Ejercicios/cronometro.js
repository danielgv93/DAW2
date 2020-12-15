addEventListener("load", inicio, false);

function inicio() {
    let [segundos, minutos, horas, dias] = [0, 0, 0, 0];
    let start = document.getElementById("start");
    let stop = document.getElementById("stop");
    let resume = document.getElementById("resume");
    let reset = document.getElementById("reset");
    let cronometro = document.getElementById("cronometro");
    let reloj = `${dias}:${horas}:${minutos}:${segundos}`;
    let temporizador;

    start.addEventListener("click", function () {
        temporizador = setInterval(function () {
            segundos++;
            [dias, horas, minutos, segundos] = transformTiempo(dias, horas, minutos, segundos);
            cronometro.innerText = `${dias}:${horas}:${minutos}:${segundos}`;
        }, 1000);
    }, false);

}

function transformTiempo(dias, horas, minutos, segundos) {
    if (segundos >= 60) {
        minutos++;
        segundos = 0;
    }
    if (minutos >= 60) {
        horas++;
        minutos = 0;
    }
    if (horas >= 24) {
        dias++;
        horas = 0;
    }
    return [dias, horas, minutos, segundos];
}
