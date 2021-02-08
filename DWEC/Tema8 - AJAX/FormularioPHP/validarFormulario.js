addEventListener("load", inicio, false);

function inicio() {
    let email = document.getElementById("envioEmail");
    let contra1 = document.getElementById("envioContra1");
    let contra2 = document.getElementById("envioContra2");
    let boton = document.getElementById("enviar");

    boton.addEventListener("click", function () {
        let xhr = new XMLHttpRequest();
        let par1 = "envioEmail=" + email.value;
        let par2 = "envioContra1=" + contra1.value;
        let par3 = "envioContra2=" + contra2.value;
        xhr.open("GET", "php1.php?" + par1 + "&" + par2 + "&" + par3, true);
        xhr.send(null);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    document.querySelector("section").innerHTML = xhr.responseText;
                } else {
                    alert("ERROR" + xhr.status);
                }
            }
        }
    })

}