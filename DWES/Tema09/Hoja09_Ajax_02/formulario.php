<?php
require_once "validar.php";
if (isset($_POST["enviar"])) {
    var_dump($_POST);
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .oculto {
            display: none;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
<form action="#" method="post" id="datos">
    <label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre"><br><span id='errorNombre' for='nombre' class='<?php if(!isset($_POST['enviar']) || validarNombre($_POST['nombre'])) echo "oculto "; ?>error'>El nombre debe tener más de 3 caracteres.</span><br>
    <label for="dni">DNI: </label><input type="text" name="dni" id="dni"><br><span id='errorDni' for='dni' class='<?php if(!isset($_POST['enviar']) || validarDni($_POST['dni'])) echo "oculto "; ?>error'>El DNI introducido no es correcto.</span><br>
    <label for="pass1">Password: </label><input type="password" name="pass1" id="pass1"><br><span id='errorPass' for='pass1' class='<?php if(!isset($_POST['enviar']) || validarPasswords($_POST['pass1'], $_POST["pass2"])) echo "oculto "; ?>error'>Las contraseñas no coinciden o no cumplen los requisitos.</span><br>
    <label for="pass2">Repite la password: </label><input type="password" name="pass2" id="pass2">
    <input type="submit" name="enviar" id="enviar" value="Enviar">
</form>
<script src="jquery-3.5.1.js"></script>
<script src="validar.js"></script>
</body>
</html>