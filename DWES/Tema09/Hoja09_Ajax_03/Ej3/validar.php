<?php
function validarNombre($nombre)
{
    return strlen($nombre) >= 3;
}

function validarDni($dni){
    $letra = substr($dni, -1);
    $numeros = substr($dni, 0, -1);
    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
        return true;
    }else{
        return false;
    }
}

function validarPasswords($pass1, $pass2)
{
    return $pass1 === $pass2 && $pass1 >= 6;
}

function validar()
{
    $respuesta = array();
    if (!validarNombre($_POST["nombre"])) {
        $respuesta[] = base64_encode("El nombre debe tener más de 3 caracteres.");
    }
    if (!validarDni($_POST["dni"])) {
        $respuesta[] = base64_encode("El DNI introducido no es correcto.");
    }
    if (!validarPasswords($_POST["pass1"], $_POST["pass2"])) {
        $respuesta[] = base64_encode("Las contraseñas no coinciden o no cumplen los requisitos.");
    }
    return $respuesta;
}

echo json_encode(validar());