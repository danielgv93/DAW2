<?php
    var_dump($_POST);
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
    <label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre"><br>
    <label for="dni">DNI: </label><input type="text" name="dni" id="dni"><br>
    <label for="pass1">Password: </label><input type="password" name="pass1" id="pass1"><br>
    <label for="pass2">Repite la password: </label><input type="password" name="pass2" id="pass2">
    <input type="submit" name="enviar" id="enviar" value="Enviar">
    <br>
    <div id="errores"></div>
</form>
<script src="jquery-3.5.1.js"></script>
<script src="validar.js"></script>
<script>
    $(document).ready(function () {
        $("#enviar").click(function (e) {
            e.preventDefault();
            let nombre = $("#nombre").val();
            let dni = $("#dni").val();
            let pass1 = $("#pass1").val();
            let pass2 = $("#pass2").val();
            $.ajax({
                type : "POST",
                url : "validar.php",
                dataType : "json",
                data : {
                    "nombre" : nombre,
                    "dni" : dni,
                    "pass1" : pass1,
                    "pass2" : pass2,
                },
                success : function (json) {
                    console.log(json);
                    for (let i = 0; i < json.length; i++) {
                        $("#errores").append(`<p>${json[i]}</p>`)
                    }
                    if (json.length == 0) {
                        $("#datos").submit(); //TODO: HACER QUE SE ENVIE EL FORMULARIO
                    }

                },
                error : function () {

                }
            })
        })
    })
</script>
</body>
</html>