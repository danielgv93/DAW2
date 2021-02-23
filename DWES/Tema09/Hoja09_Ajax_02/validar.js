$(document).ready(function () {
    let nombre = $("#nombre");
    let errorNombre = $("#errorNombre");
    let dni = $("#dni");
    let errorDni = $("#errorDni");
    let pass1 = $("#pass1");
    let errorPass = $("#errorPass");
    let pass2 = $("#pass2");

    function validarNombre() {
        if (nombre.val().length < 4) {
            errorNombre.removeClass("oculto");
            return false;
        }
        errorNombre.addClass("oculto");
        return true;
    }

    function validarDNI() {
        let number = dni.val().substr(0, 8);
        let letter = dni.val().substr(8, 1);
        if (!isNaN(number)
            && isNaN(letter)
            && number.toString().length === 8
            && letter.length === 1) {
            let lettersOrder = 'TRWAGMYFPDXBNJZSQVHLCKET';
            if (lettersOrder[number % 23] === letter.toUpperCase()) {
                errorDni.addClass("oculto");
                return true;
            }
        }
        errorDni.removeClass("oculto");
        return false;
    }

    function validarPasswords() {
        if (pass1.val() === pass2.val() && pass1.val().length > 4) {
            errorPass.addClass("oculto");
            return true;
        }
        errorPass.removeClass("oculto")
        return false;
    }

    function validar() {
        let valN, valD, valP;
        valN = validarNombre();
        valD = validarDNI();
        valP = validarPasswords();
        return valN && valD && valP;
    }

    $("#datos").submit(function () {
        return validar();
    });
})