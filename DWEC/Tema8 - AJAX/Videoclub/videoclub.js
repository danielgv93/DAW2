addEventListener("load", inicio, false);

function inicio() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "videoclub.xml", true);
    xhr.send(null);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                let videoclub = xhr.responseXML.children[0];
                crearSelect(videoclub);
                crearTitulos(videoclub);

            } else {
                alert("ERROR: " + xhr.status);
            }
        }
    }

    function crearTitulos(videoclub) {
        let div = document.getElementById("titulos");
        let titulos = Array();
        for (let i = 0; i < videoclub.children.length; i++) {
            titulos.push(videoclub.children[i].children[0].innerHTML)
        }
        for (let i = 0; i < titulos.length; i++) {
            let h2 = document.createElement("h2");
            h2.setAttribute("id", `${i}.jpg`);
            h2.innerHTML = titulos[i];
            h2.addEventListener("click", function () {
                clickarTitulo(videoclub);
            }, false)
            div.appendChild(h2);
        }
        for (const titulo of titulos) {

        }
    }

    function clickarTitulo(videoclub) {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "caratulas.txt", true);
        xhr.send(null);
        xhr.onreadystatechange = function () {
            if (xhr.status === 200) {
                if (xhr.status === 4) {
                    let caratulas = xhr.responseText;
                    for (let i = 0; i < videoclub.children.length; i++) {
                        //TODO: CONTINUAR
                        if (videoclub.children[i].get) {
                        }
                    }
                } else {
                    alert("ERROR: " + xhr.status);
                }
            }
        }

    }

    function crearSelect(videoclub) {
        let generos = Array();
        let select = document.getElementById("generos");

        for (let i = 0; i < videoclub.children.length; i++) {
            generos.push(videoclub.children[i].children[2].innerHTML)
        }
        generos = generos.filter(unique);
        for (const genero of generos) {
            let option = document.createElement("option");
            option.setAttribute("value", genero);
            option.innerText = genero;
            select.appendChild(option);
        }
    }

    const unique = (value, index, self) => {
        return self.indexOf(value) === index
    }
}