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
    return $pass1 == $pass2 ;
}

function validar($nombre, $dni, $pass1, $pass2)
{
    $respuesta = array();
    if (!validarNombre($nombre)) {
        $respuesta[] = "El nombre debe tener más de 3 caracteres.";
    }
    if (!validarDni($dni)) {
        $respuesta[] = "El DNI introducido no es correcto.";
    }
    if (!validarPasswords($pass1, $pass2)) {
        $respuesta[] = "Las contraseñas no coinciden o no cumplen los requisitos.";
    }
    return $respuesta;
}


echo json_encode(
    validar($_POST["nombre"], $_POST["dni"], $_POST["pass1"], $_POST["pass2"])
);