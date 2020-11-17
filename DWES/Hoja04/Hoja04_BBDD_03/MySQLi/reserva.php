<?php

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Reserva de asiento</h1>
<hr>
<form action="#" method="post">
    <label for="nombre">
        Nombre: <input type="text" name="nombre" id="nombre" placeholder="Su nombre">
    </label><br>
    <label for="dni">
        DNI: <input type="text" name="dni" id="dni" placeholder="Su DNI">
    </label>
    <label for="asiento">
        DNI: </label>
    <select name="asiento">

        <?php foreach ($pasajeros as $persona) : ?>
            <option value="<?= $equipo ?>" <?= $selectedProp = (isset($equipoSeleccionado) &&
                $equipoSeleccionado == $equipo) ? "selected" : ""; ?>><?= $equipo ?></option>
        <?php endforeach ?>

    </select>

</form>
</body>
</html>
